<?php

$fiberUsers = new Fiber(function (): void {
    $value = Fiber::suspend("fiber_users");
    echo "Fiber users: ", $value, PHP_EOL;
});

$value = $fiberUsers->start();
echo "Fiber users interrupted....", PHP_EOL;

$fiberPosts = new Fiber(function():void{
    $value = Fiber::suspend("fiber_posts");
    echo "Fiber posts: " , $value, PHP_EOL;
});

$value = $fiberPosts->start();
echo "Fiber posts interrupted...", PHP_EOL;

$fiberPostsComments = new Fiber(function():void{
    $value = Fiber::suspend("fiber_comments");
    echo "Fiber comments: " , $value, PHP_EOL;
});

$value = $fiberPostsComments->start();
echo "Fiber comments interrupted...", PHP_EOL;
