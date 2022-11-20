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


        $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
        if (true || hash_equals($githubHash, $localHash)) {
            $root_path = base_path();

            $process = new Process([$root_path, './deploy.sh']);

            $process->run(function ($type, $buffer) {
                echo '<br>';
                echo $buffer;
            });

            dd($root_path . '; ./deploy.sh', $process->getCommandLine());

            // $process = new Process('cd ' . $root_path . '; ./deploy.sh');
            // $process->run(function ($type, $buffer) {
            //     echo $buffer;
            // });
        }
    }
}
