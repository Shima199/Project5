# Group Members <br>
1- SAMAE ARMEEROH 1722098 
<br>
2- SHIMA HAIDAR ABDULLAH ALATAS 1725900
<br>
3- SALEH KAWTHAR SHAMSU ALAM 1725298
<br>
4- IMRAN MD FAHAD MAHMUD 1722081
<br>
<hr>

# Introduction 
Bus Reservation System is designed to automate the online ticket purchasing through an easy-to-use online bus booking system. Embed our online bus ticketing system into our website and enable our customers to book tickets for various routes and destinations. With the bus ticket reservation system, passengers  can manage reservations, client data, and passenger lists. Passengers  can also schedule routes, set seat availability, upload an interactive seat map and let customers select their seats.
<br>
<hr>

# Objective <br>
The objective of this web based bus reservation system are: <br>
<ul>
<li>Make the booking process easier and comfortable for customers that are in and away from their home.</li>
<li>Save customer’s time, by providing online service for the customer, where the customer can book a ticket 24\7.</li>
<li>Enabling the customer to check the destination of the bus that is available and the time for departure and arrival.</li>
</ul>
<hr>

# Features and Functionalities
<ul>
<li>This reservation system will have the ability to make the customer choose various routes and destinations and it will be displayed through the web application.</li>
<li>The admin will be able to add the buses, destinations, time, and the operator name and view the list of the buses that will show on the screen.</li>
<li>The admin can view all the users in the system.</li>
<li>The customer will be able to see the seat availability, to book a ticket and  all the information is going to be displayed.</li>
<li>The customer can update his profile easily in the system.</li>
</ul>
<hr>

# Views, Controllers, Routes, Models
<h3>Views</h3>
<h6>Admin</h6>
<ul>
 <li>Buses</li>
  <ul style="list-style-type:square;">
  <li>Add Bus</li>
  <li>Bus List</li>
  <li>View Bus</li>
  </ul>
 <li>Users List</li>
 <li>Admin Dashboard</li>
</ul>

<h6>Passenger</h6>
<ul>
 <li>Book</li>
 <li>Passenger dashboard</li>
 <li>Update profile</li>
 <li>Trips</li>
</ul>

<h3>Controllers</h3>
<ul>
 <li>Authentication controller </li>
 <li> Bus controller </li>
  <li>User controller </li>
 <li>Trips controller </li>
 <li> Book Controller </li>
</ul>

<h3>Route</h3>
<ul>
<li>Admin page route</li>
<li>User page </li>
<li>Update user profile route</li>
<li>View Users route</li>
<li>Bus route</li>
<li>Book route</li>
<li>View Trips route</li>
</ul>

<h3>Models</h3>
<ul>
<li>Bus model</li>
<li>Users model</li>
<li>Trips model</li>
<li>Book model</li>
</ul>
<hr>

# Work Distributions <br>
1 ) ARMEEROH <br> - Manage trips in admin page <br> 
             - index.blade.php , create.blade.php , edit.blade.php , master.blade.php , Buscontroller.php , Route , Model & bus migration <br>
             - Trip CRUD insert, edit & delete for trips information <br>
             - Automatically insert, update, delete in the database for trips <br>
             - Report & sequence diagram <br> <br>
             
2 ) SHIMA <br>   - Authentication to 2 different pages <br>
             - Redirect the user to user dashboard <br>
             - Redirect the Admin to Admin dashboard<br>
             - View all the users in the database in the admin page<br>
             - Update profile page in the user dashboard<br>
             - Report & linking <br><br>
             
 3 ) KAWTHAR <br> - View the users trip details in the database in the users page <br>
                  - Entity relationship diagram <br>
                  - Report & linking <br><br>
 4 ) FAHAD <br>

<hr>

# ERD

![WhatsApp Image 2021-06-13 at 12 52 16](https://user-images.githubusercontent.com/79072027/121805259-aca99680-cc74-11eb-8fdb-8388b8333025.jpeg)

<hr>

# Sequence Diagram
![Admin](https://user-images.githubusercontent.com/79072027/121787392-04ea8500-cbf0-11eb-859a-8a445251d692.jpg)
![Customer](https://user-images.githubusercontent.com/79072027/121787394-0916a280-cbf0-11eb-85aa-d8b208d614e8.jpg)

<hr>

#  References

<ul>
 <li>https://stackoverflow.com/</li>
 <li>https://laravel.com/</li>
</ul>

