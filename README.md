# simple-comment-form
Super Simple comment form written in PHP, JavaScript and HTML - free to use, edit, modify! includes SPAM protection and 2 required fields.
When the user submits the form it creates a file in the same directory called "comments.php", the file will be ammended with comments as they are posted.



The contact form is written with security in mind, it provides simple required fields that must be filled to submit the form.

It also features protection from XSS using the $_SERVER["PHP_SELF"] super global.

Preview:
https://autonetix.co/comment-test/final/comment-form-final.php
