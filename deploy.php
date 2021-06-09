<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'my_project');
set('default_stage', 'staging');
set('keep_releases', 3);

// Project repository
set('repository', 'https://github.com/ethanjohnstone/genesis.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', [
    '.env'
]);

set('shared_dirs', [
    'assets',
    'silverstripe-cache'
]);

// Writable dirs by web server
set('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts
host('staging')
    ->stage('staging')
    ->hostname('deployer.cb.baa.nz')
    ->user('baa_ss_deploy')
    ->set('branch', 'staging')
    ->set('deploy_path', '/staging');

host('prod')
    ->stage('production')
    ->hostname('deployer.cb.baa.nz')
    ->user('baa_ss_deploy')
    ->set('branch', 'production')
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
