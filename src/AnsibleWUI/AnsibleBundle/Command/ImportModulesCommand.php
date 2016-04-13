<?php

namespace AnsibleWUI\AnsibleBundle\Command;

use AnsibleWUI\AnsibleBundle\Entity\Module;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class UpdateProjectsCommand
 * @package ProjectPreview\ProjectBundle\Command
 */
class ImportModulesCommand extends ContainerAwareCommand
{
    /**
     * @var ObjectManager $entityManager
     */
    protected $entityManager;
    /**
     * @var InputInterface $output
     */
    protected $input;
    /**
     * @var OutputInterface $output
     */
    protected $output;

    /**
     * Configure function
     */
    protected function configure()
    {
        $this
            ->setName('ansible:module:import')
            ->setDescription('Import of Ansible Modules')
            ;
    }

    /**
     * Execute function
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->entityManager = $this->getContainer()->get('doctrine')->getManager();
        $this->input = $input;
        $this->output = $output;

        $this->output->writeln('Import Ansible modules');

        $command = 'ansible-doc -l | cut -d" " -f1';
        foreach ($this->execCommand($command) as $module) {
            $this->importModule($module);
        }
        $this->entityManager->flush();

        $this->output->writeln('Import done !');
    }

    /**
     * @param $name
     *
     * @return bool
     */
    private function importModule($name)
    {
        if (!strlen($name)) {
            return false;
        }

        $module = new Module();
        $module->setName(ucfirst(str_replace('_', ' ', $name)));
        $snippet = [];

        $command = 'ansible-doc -s '.$name;
        try {
            $lines = $this->execCommand($command);
            foreach ($lines as $line) {
                if (preg_match('/^- name: (.*)$/', $line, $matches)) {
                    $module->setDescription($matches[1]);
                }
                if (preg_match('/^  action: (.*)$/', $line, $matches)) {
                    $module->setAction($matches[1]);
                }
                if (preg_match('/^      ([^ =]*)(=?)\s*# (.*)$/', $line, $matches)) {
                    $snippet[] = [
                        'name' => $matches[1],
                        'required' => $matches[2] == '=' ? true : false,
                        'description' => $matches[3],
                    ];
                }
            }
            $module->setSnippets($snippet);
            $this->entityManager->persist($module);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param $command
     *
     * @return array
     */
    private function execCommand($command)
    {
        $process = new Process($command);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return explode(chr(10), $process->getOutput());
    }
}
