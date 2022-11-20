<?php

namespace App\Http\Controllers\GithubAction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;

class GithubActionController extends Controller
{
    public function deploy(Request $request)
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');
        $localToken = config('github-action.key');

        // Command to exec deploy.sh for www-data
        $root_path = base_path();

        $process = new Process(['./deploy.sh']);
        $process->setWorkingDirectory($root_path);
            $process->run(function ($type, $buffer) {
                echo $buffer;
        });
        
        // chdir($root_path);
        // shell_exec('./deploy.sh');
        // dd(shell_exec('./deploy.sh'));  // ATTEMPT RUN SCRIPT

        // $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
        // if (true || hash_equals($githubHash, $localHash)) {
        //     $root_path = base_path();

        //     $process = new Process([$root_path, './deploy.sh']);

        //     $process->run(function ($type, $buffer) {
        //         echo '<br>';
        //         echo $buffer;
        //     });

        //     dd($root_path . '; ./deploy.sh', $process->getCommandLine());
        // }
    }
}
