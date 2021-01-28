<?php
include "config/config.php";
include "class/DBAbstractModel.php";
include "Models/Blog.php";
include "Models/Comment.php";

$blog1 = new Blog();
$blog1->setTitle('A day with Symfony2');
$blog1->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
$blog1->setImagen('beach.jpg');
$blog1->setAuthor('dsyph3r');
$blog1->setTags('symfony2, php, paradise, symblog');
$blog1->setCreated(new \DateTime());
$blog1->setUpdated($blog1->getCreated());
// $blog1->guardarBD();

$comment1 = new Comment();
$comment1->setUser('symfony');
$comment1->setComment('To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.');
$comment1->setBlog(3);
// $comment1->guardarBD();

$comment2 = new Comment();
$comment2->setUser('David');
$comment2->setComment('To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!');
$comment2->setBlog(3);
// $comment2->guardarBD();
// $blog1->addComment($comment1);
// $blog1->addComment($comment2);

//BLOG 2
$blog2 = new Blog();
$blog2->setTitle('The pool on the roof must have a leak');
$blog2->setBlog('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
$blog2->setImagen('pool_leak.jpg');
$blog2->setAuthor('Zero Cool');
$blog2->setTags('pool, leaky, hacked, movie, hacking, symblog');
$blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
$blog2->setUpdated($blog2->getCreated());
// $blog2->guardarBD();

$comment3 = new Comment();
$comment3->setUser('Dade');
$comment3->setComment('Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.');
$comment3->setBlog(5);
// $comment3->guardarBD();

// $comment2->guardarBD();
$comment4 = new Comment();
$comment4->setUser('Kate');
$comment4->setComment('Are you challenging me? ');
$comment4->setCreated(new \DateTime("2011-07-23 06:15:20"));
$comment4->setBlog(5);
// $comment4->guardarBD();

$comment5 = new Comment();
$comment5->setUser('Dade');
$comment5->setComment('Name your stakes.');
$comment5->setCreated(new \DateTime("2011-07-23 06:18:35"));
$comment5->setBlog(5);
// $comment5->guardarBD();

$comment6 = new Comment();
$comment6->setUser('Kate');
$comment6->setComment('If I win, you become my slave.');
$comment6->setCreated(new \DateTime("2011-07-23 06:22:53"));
$comment6->setBlog(5);
// $comment6->guardarBD();

$comment7 = new Comment();
$comment7->setUser('Dade');
$comment7->setComment('Your SLAVE?');
$comment7->setCreated(new \DateTime("2011-07-23 06:25:15"));
$comment7->setBlog(5);
// $comment7->guardarBD();

$comment8 = new Comment();
$comment8->setUser('Kate');
$comment8->setComment('You wish! You\'ll do shitwork, scan, crack copyrights...');
$comment8->setCreated(new \DateTime("2011-07-23 06:46:08"));
$comment8->setBlog(5);
// $comment8->guardarBD();

$comment9 = new Comment();
$comment9->setUser('Dade');
$comment9->setComment('And if I win?');
$comment9->setCreated(new \DateTime("2011-07-23 10:22:46"));
$comment9->setBlog(5);
// $comment9->guardarBD();

$comment10 = new Comment();
$comment10->setUser('Kate');
$comment10->setComment('Make it my first-born!');
$comment10->setCreated(new \DateTime("2011-07-23 11:08:08"));
$comment10->setBlog(5);
// $comment10->guardarBD();

$comment11 = new Comment();
$comment11->setUser('Dade');
$comment11->setComment('Make it our first-date!');
$comment11->setCreated(new \DateTime("2011-07-24 18:56:01"));
$comment11->setBlog(5);
// $comment11->guardarBD();

$comment12= new Comment();
$comment12->setUser('Kate');
$comment12->setComment('I don\'t DO dates. But I don\'t lose either, so you\'re on!');
$comment12->setCreated(new \DateTime("2011-07-25 22:28:42"));
$comment12->setBlog(5);
// $comment12->guardarBD();

// $blog2->addComment($comment3);
// $blog2->addComment($comment4);
// $blog2->addComment($comment5);
// $blog2->addComment($comment6);
// $blog2->addComment($comment7);
// $blog2->addComment($comment8);
// $blog2->addComment($comment9);
// $blog2->addComment($comment10);
// $blog2->addComment($comment11);
// $blog2->addComment($comment12);

// //BLOG 3
$blog3 = new Blog();
$blog3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
$blog3->setBlog('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
$blog3->setImagen('misdirection.jpg');
$blog3->setAuthor('Gabriel');
$blog3->setTags('misdirection, magic, movie, hacking, symblog');
$blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
$blog3->setUpdated($blog3->getCreated());
// $blog3->guardarBD();

$comment13 = new Comment();
$comment13->setUser('Stanley');
$comment13->setComment('It\'s not gonna end like this.');
$comment13->setBlog(6);
// $comment13->guardarBD();

$comment14 = new Comment();
$comment14->setUser('Gabriel');
$comment14->setComment('Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.');
$comment14->setBlog(6);
// $comment14->guardarBD();
// $blog3->addComment($comment13);
// $blog3->addComment($comment14);

// //BLOG 4
$blog4 = new Blog();
$blog4->setTitle('The grid - A digital frontier');
$blog4->setBlog('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
$blog4->setImagen('the_grid.jpg');
$blog4->setAuthor('Kevin Flynn');
$blog4->setTags('grid, daftpunk, movie, symblog');
$blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
$blog4->setUpdated($blog4->getCreated());
// $blog4->guardarBD();

// //BLOG 5
$blog5 = new Blog();
$blog5->setTitle('You\'re either a one or a zero. Alive or dead');
$blog5->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
$blog5->setImagen('one_or_zero.jpg');
$blog5->setAuthor('Gary Winston');
$blog5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
$blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
$blog5->setUpdated($blog5->getCreated());
// $blog5->guardarBD();

$comment15 = new Comment();
$comment15->setUser('Mile');
$comment15->setComment('Doesn\'t Bill Gates have something like that?');
$comment15->setBlog(8);
// $comment15->guardarBD();

$comment16 = new Comment();
$comment16->setUser('Gary');
$comment16->setComment('Bill Who?');
$comment16->setBlog(8);
// $comment16->guardarBD();
// $blog5->addComment($comment15);
// $blog5->addComment($comment16);

$blogs = [
    $blog1,
    $blog2,
    $blog3,
    $blog4,
    $blog5,
];
$comments = [
    $comment1,
    $comment2,
    $comment3,
    $comment4,
    $comment5,
    $comment6,
    $comment7,
    $comment8,
    $comment9,
    $comment10,
    $comment11,
    $comment12,
    $comment13,
    $comment14,
    $comment15,
    $comment16,
];

// ?>