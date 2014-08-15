<?php

// Maybe we're on our own, or maybe we've been pulled in by another project.

$project = realpath(__DIR__ . '/../vendor/autoload.php');
$parentProject = realpath(__DIR__ . '/../../../../vendor/autoload.php');

if (file_exists($project)) {
    require $project;
} elseif (file_exists($parentProject)) {
    require $parentProject;
} else {
    throw new \Exception('Dude, you have no vendor.');
}
