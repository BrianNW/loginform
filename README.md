Steps We Need to take

1) Build Login HTML form
2) Check if form as been submitted
3) Validate form data
4) Add form data to variables
5) Connect to database
6)Query the database for username submitted in the form
6.1) If no entries: show error message
7) Store basic user data from database in variables
8) Verify stored hashed password with the one submitted in the form
8.1) If invalid: show error message
9) Start a session and create session variables
10) Redirect to a profile page
10.1)Provide link to "logout" page
10.2)Add cookie clear to logout page
10.3)Provide link to log back include
11.)Close the MySQL connection
