# the-plot-thickens
Parking Lot Assignment

# System Plan: 

Create a website where users are of 3 categories- students, faculty and handicapped(maybe student or faculty, will be assigned at the time of account creation). These accounts are pre-fed in the system by administrator. When users login, they will be able to see a map with a key showing all the slots. 
They can observe the one closest to their entry point to the lot and send a request to reserve it. If the slot is unreserved, it will be granted to this user and corresponding update will be made to database. If the slot is already reserved or the chosen slot is not as per the privileges afforded to their user category, they will not be given the slot, and will have to choose something else.
<br/>
# Software used:<br/>
-XAMPP v3.2.2 : Apache/2.4.38 (Win64) OpenSSL/1.1.1a PHP/7.3.2 Database client version: libmysql - mysqlnd 5.0.12-dev - 20150407 - $Id: 7cc7cc96e675f6d72e5cf0f267f48e167c2abb23 $<br/>
-Chrome Web Browser for testing<br/>
-HTML, CSS, Javascript<br/>
-PHP for server-side programming<br/>

# Primary Online references:<br/>
-W3Schools and stackoverflow for incorporating best-practices in syntax and semantics and error resolving.

# Functional aspects:<br/>
-Username and password are the same. Student IDs in range 7001-12000, Faculty usernames in range 201-800, Handicapped IDs in range 1001-1100.<br/>
-Image for map is a static image in current implementation, however it is responsive to screen size. Users have to observe key under the map and choose a spot.<br/>
-Database consists of 3 tables-<br/>
![phpmyadmin database](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/admin_db.JPG)
--users(username, password, user_type)- all user identification is stored here, see below screenshot where 2 IDs have been allocated for each user_type<br/>
![phpmyadmin users](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/usersDB.JPG)
--count_table(type, slot_count)-count of each type of parking lot is present here, will be referred to while displaying to user and updated each time there is reservation
![phpmyadmin count_table ](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/countTableDB.JPG)
--slot_table(slot_id, status, user_type, user)-each parking slot's status along with who has reserved it/unreserved is stored. If Status is unreserved at the time of request, status will be updated to reserved. Else, user will be told it is not applicable.
![phpmyadmin slot](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/slotDB.JPG)

# Implementation:
User login form
![login/homepage](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/homepage.JPG)
Dashboard to show user slots and occupancy
![dashboard](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/dashboard.JPG)
User can refer to map and choose slot for parking-
![enter slot number]( https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/enterslot.JPG)
When user enter incorrect credentials, login form is reloaded.
![invalid user](https://github.com/thisisabhinaya/the-plot-thickens/blob/master/plot/screenshots/invaliduser.JPG)

# Issues:
Inspite of best efforts, due to excessive errors with both mysqli and PDO methods of accessing and storing data from and to the database, I could not implement this beyond the dashboard. I have only worked with PHP 5 in the past, and with new issues in PHP 7, it was not possible to move forward. Upto 1 variable, smooth retrieval from database was possible. The username as session variable was passed successfully from page to page. However, user_type is crucial in order to check for availability and update slot count on reservation. Even though I could retrieve user_type, because of a lack of coordination through AJAX or other means between user's chosen slot input and allocating it for corresponding user_type in database, the slot and count_table could not be updated. As a result, project could not be implemented fully.
Several hours of debugging were to no avail, if anything it took away more time from Styling aspect of the site, which could have been improved with attractive formatting.
Please refer https://github.com/thisisabhinaya/the-plot-thickens/blob/master/before_reserve.JPG and  https://github.com/thisisabhinaya/the-plot-thickens/blob/master/after_reserve.JPG for planned implementation image.


# Future scope:<br/>
-Can implement AJAX for better control over parameter passing between Javascript, PHP, MySQL and optimizing page reloading<br/>
-Image map can be made an interactive graphic through JQuery, linked to database and user can directly choose a spot to reserve from it.<br/>
-Can add feature to call Security of College Main Gate in case of parking issues/emergency<br/>
-Can allow users to feed time when they will be vacating the slot, so next person can book with guarantee of preferred slot by the time they report to college for later lectures/after break<br/>
-Can add payment charging feature for parking for a period >6 hours <br/>
-Can incorporate separate slots for two wheelers and 3 wheelers <br/>

