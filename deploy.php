<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/ethanjohnstone/genesis.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('deployer.cb.baa.nz')
    ->user('baa_ss_deploy')
    ->set('deploy_path', '/httpdocs');

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

task('test', function () {
    writeln('Hello world');
});

task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
