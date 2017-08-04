# ContentFilter
Application designed to restrict users to view and open certain URL's by adding restricted URL's to the database.
Users need to log on into the application and can add unwanted URL's to the database so that people especially children can't open the URL's inside this application and can view them. Users who has the access can add, edit or delete these URL's from the DB.
//Database

1. You can find securly.sql file which contains the database and tables. Please create a database with a name called securly and import securly.sql file to your mysql database without whch this application will not work.

2. The DB connections file is in Private/DBConnections.php file and the username is root and there is no password. If you want to give username and password you can change it there otherwise it is better to leave it unchanged.

3.Some data has already been inserted in the tables, please test the application without deleting the data in the tables. You cab  modify or delete the data in the database tables after testing the application.

//Application details
1. Created a login page to login and values are hardcoded in the doLogin.php so, we can use any credentials to login in Login.php page which is the main page.

2. Created a database called Securly and added two table called users and urllist where users and their unique id will be in the users table and their assosciated restricted url's will be added to the urllist table.

3.After login we can see FilterPage, AddURL Page and ViewURL page.

4.To open url in the iframe go to FilterPage and type in the url and hit GO. If you are restricted to use the url then it will show as BLOCKED else the content of the url will be shown in the iframe.

5.To add restricted url's go to AddURL page and add the url. Once you add the url you will be redirected to ViewURL page to see the added url's.

6. To View and delete restricted url's you can go to ViewURL page.

//Sample unrestricted url's

1. https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1

//sample restricted url's
1. https://facebook.com
2.https://twitter.com

//Author - Sriram Manchiraju
