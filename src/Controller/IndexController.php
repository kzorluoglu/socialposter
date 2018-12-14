<?php

namespace d8devs\socialposter\Controller;

use d8devs\socialposter\Base;
use d8devs\socialposter\Controller\FacebookController;
use d8devs\socialposter\Controller\TwitterController;
use d8devs\socialposter\Model\Post;
use d8devs\socialposter\Helper\Upload;

/**
 * Description of IndexController
 *
 * @author Koray Zorluoglu <koray@d8devs.com>
 */
class IndexController extends Base
{

    /**
     * Sender Class
     * @var [FacebookController|TwitterController]
     */
    private $sender;

    public function index()
    {


        if ($_POST) {
            $formattedPostRequest = $this->formatPostRequest($_POST);
            $files = $this->uploadFiles($_FILES['files']);
            $this->createPosts($formattedPostRequest, $files);
        }

        $this->render('index');
    }

    private function createPosts($formattedPostRequest, $files)
    {

        foreach ($formattedPostRequest as $post) {
            $newPost = new Post();
            $newPost->for = $post['for'];
            $newPost->target = $post['target'];
            $newPost->message = $post['message'];
            $newPost->attachments = $files;
            $newPost->created_at = strtotime('now');
            $newPost->save();
        }
    }

    public function send(Post $post)
    {

        if ($post->for == "facebook_page") {
            $this->sender = new FacebookController();
        }

        if ($post->for == "twitter_account") {
            $this->sender = new TwitterController();
        }

        return $this->sender->send($post);
    }

    public function formatPostRequest(array $posts)
    {
        $formattedPosts = array();
        for ($i = 0; $i < count($posts['facebook_page']); $i++) {
            $formattedPosts[] = array(
                'for' => 'facebook_page',
                'target' => $posts['facebook_page'][$i],
                'message' => $posts['message']
            );
        }
        for ($i = 0; $i < count($posts['twitter_account']); $i++) {
            $formattedPosts[] = array(
                'for' => 'twitter_account',
                'target' => $posts['twitter_account'][$i],
                'message' => $posts['message']
            );
        }
        for ($i = 0; $i < count($posts['instagram_account']); $i++) {
            $formattedPosts[] = array(
                'for' => 'instagram_account',
                'target' => $posts['instagram_account'][$i],
                'message' => $posts['message']
            );
        }
        return $formattedPosts;
    }

    public function uploadFiles(array $files)
    {
        $upload = new Upload($files);
        $upload->uploadFiles();
        return $upload->getUploadedFiles();
    }
}
