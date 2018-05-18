Hi there,
Thanks for visiting our website. This file serves to help you set up this application on your system and run it
Assuming that you already have PHP and MySQL database running, we'll help you with how to set up the database
First create the following three tables

POSTS:
id    - int(11)
text  - text
likes - int(11)


USERS:
id     - int(11)
name   - varchar(255)

LIKES:
id     - int(11)
userid - int(11)
postid - int(11)

In the posts table, using a tool like phpmyadmin, insert some dummy value in the form of text. Insert as many records as you want. When you launch your application, these posts will be displayed on the page.

Thanks
Awa Melvine from codingpoets.com