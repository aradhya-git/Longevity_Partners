# Longevity_Partners

## About The Project

As a Database Engineer, I have been tasked with designing a database for BookIt, a small start-up book review company. The purpose of the database is to store information about weekly best-selling "Combined Print & E-Book Nonfiction" books from the New York Times, as well as details about the authors and commentary provided by the BookIt Team.

## ER Diagram

<img width="756" alt="Screen Shot 2023-05-31 at 10 22 58 PM" src="https://github.com/aradhya-git/Longevity_Partners/assets/111474250/d4bd6120-0e97-4ca0-8185-ae4b36b501a1">

## Table Information

1. <b>Book</b>: Stores information about books, including the title, ISBN (unique identifier), and publication date.
2. <b>Book_Author_mapping</b>: Represents the relationship between books and authors by linking the author ID with the book's ISBN.
3. <b>Author</b>: Stores information about authors, including their first and last names, date of birth, and a unique author ID.
4. <b>Commentator</b>: Contains details about the commentators who provide book reviews, including their ID, first and last names, email address, and Twitter handle.
5. <b>Comments</b>: Stores the actual comments provided by the commentators, including the comment ID, commentator ID (linked to the Commentator table), book's ISBN (linked to the Book table), comment date, score, summary review, and full review.
6. <b>Best_Sellers</b>: Tracks information about best-selling books, including the book's ISBN, the date it was published, and the total number of weeks it has been a best seller.

## General Information On the Project Flow

First, it imports some tools that help with working with data and creating visualizations.

Then, it creates an empty table called df_final to store the information about the best-selling books.

Next, it goes through a range of years from 2012 to 2023 and reads a CSV file for each year. It adds the data from each file to the df_final table.

The code then connects to a database called "BookIt" and creates several tables inside it. These tables are used to store different types of information about the books, authors, commentators, comments, and best-sellers.

The code also defines a function called author_split that splits the names of authors and creates a separate table for authors with their first names, last names, and ISBN.

The code then performs SQL queries on the database to extract information. It retrieves the titles of books, their published dates, and the maximum number of weeks they appeared on the best-sellers list. It creates a histogram visualization using this information.

![image](https://github.com/aradhya-git/Longevity_Partners/assets/111474250/6b9044b8-0918-41fb-b4f6-32756aefd000)

It also retrieves the titles, published dates, and maximum weeks for books that were on the best-sellers list for 10 or more weeks.

![image](https://github.com/aradhya-git/Longevity_Partners/assets/111474250/951ace62-0e11-4200-b613-59b86104f7e0)

Furthermore, it retrieves the titles of books published after 2020 and creates a histogram of the publication years.

![image](https://github.com/aradhya-git/Longevity_Partners/assets/111474250/7ea68574-5325-4676-b9a4-9b0d0bc94d27)

In summary, this code reads data about best-selling books, stores it in a database, and performs various queries to analyze and visualize the information. It helps us understand which books were popular for a long time, which authors were involved, and when the books were published.

## Build or describe a process for validating the database for any missing entries. 

First, it defines a SQL query called query_for_all_table_name. This query retrieves the names of all tables in the database. It uses the sqlite_master table and filters by the type column to only include tables.

Next, it executes the SQL query using pd.read_sql_query and stores the result in the DataFrame df_for_all_table_name. This DataFrame will contain a single column named 'name' that holds the names of all the tables in the database.

Then, the code starts a loop to iterate over each table name in df_for_all_table_name. It checks if the table name is not equal to 'sqlite_sequence'. The 'sqlite_sequence' table is an internal table used by SQLite to keep track of auto-incremented primary key values and can be ignored for this purpose.

Inside the loop, it constructs a SQL query by concatenating the table name with the string 'SELECT * FROM '. This query selects all the columns and rows from the current table.

It executes the SQL query using pd.read_sql_query and stores the result in the DataFrame df_temp. This DataFrame holds the data from the current table.

Then, it prints some information about the table. It first prints the table name using the print('Table', i) statement.

Next, it calculates the number of null values in each column of the table by calling df_temp.isnull().sum(). This information indicates how many missing values exist in each column.

Finally, it prints an empty line print() to separate the information of each table.

In summary, the code retrieves the names of all tables in the SQLite database and then iterates over each table to retrieve the data and provide information about the null values in each table. This allows you to understand the completeness of data in each table and identify any missing values.

## Build or describe how you would build a user-interface to enable non-coders in BookIt to update the database so they could provide commentary on each books.

 a web page for the "BookIt Review" page. Here's a breakdown of the general information about the web page:

- Title: The title of the web page is set to "BookIt Review Page." It appears in the browser's title bar or tab.

- Styling: The page's background color is set to a shade of blue (#2980b9), and the text color is set to white (#FFF). The font family used is Helvetica. The body selector applies these styles to the entire page. The text-align: center property centers the content horizontally, and margin: 0 removes any default margin.

- Page Structure: The page consists of a single body element containing a center element. The content within the center element is centered horizontally on the page.

- Heading: The page includes an h1 element with the text "BookIt Review," representing the main heading of the page.

- Form: The page contains a form enclosed within a form element. The form has an unspecified method (method="") and its action is set to "index.php" (action="index.php"). The form is used to collect user input and submit it to the specified action (server-side script) for processing.

- Input Fields: The form includes several input fields. Each input field is represented by an input element with a type attribute set to "text." The fields are labeled with corresponding label elements, such as "First Name," "Last Name," "Email-Address," and "Twitter-Handle." Users can enter their information in these fields.

- Select Dropdowns: The form includes two dropdown menus represented by select elements. The first dropdown is labeled "Choose a Book" and allows users to select a book from a list of options. The second dropdown is labeled "Give Score" and allows users to select a score from 1 to 5.

- Comment Field: The form includes a text input field labeled "Comment." Users can enter their comments in this field.

- Submit Button: The form includes an input element with type="submit". Clicking this button submits the form data to the specified action (server-side script) for processing.

Overall, this HTML code represents a simple web page with a form where users can provide their information, select a book, give a score, and leave comments. The form data can be submitted for further processing on the server side.

<img width="1436" alt="Screen Shot 2023-05-31 at 10 59 25 PM" src="https://github.com/aradhya-git/Longevity_Partners/assets/111474250/ea3f748e-e904-4872-abca-41dc00861dad">

### PHP Code

The PHP code provided appears to be a prototype or sample code for a web form that collects user comments and stores them in a database. Here's an explanation of the code's functionality:

1. Database Interaction: Inside the else block of the if statement, the code establishes a connection to a SQLite database. It uses a PDO object to interact with the database.

2. SQL Query and Parameter Binding: The code prepares an SQL INSERT statement to insert the user's comment into the database. It binds the form input values to the prepared statement using bindValue() and placeholders like :fname, :lname, :email, and :twitterh.

3. Execution and Success Handling: The prepared statement is executed using execute(). If the execution is successful ($success is true), the code displays a success message. Otherwise, it displays an error message.

4. Exception Handling: The code includes exception handling using a try-catch block. If any error occurs during the database interaction, it catches the PDOException and displays an error message.

Overall, this PHP code demonstrates a simple prototype for collecting user comments through a web form and storing them in a SQLite database. It showcases the basic structure of connecting to the database, executing SQL queries, and handling success or error messages. Further development and enhancements would be required to make it fully functional and secure for production use.


## Future Scope
  
The code is a prototype, so it is not complete. For example, it does not include any error handling. It also does not include any code to display the reviews that have been submitted. However, the code provides a good starting point for a more complete application.
Here are some additional things that could be added to the code:
<ol>
  <li>	Error handling: The code should be updated to include error handling. This will help to prevent errors from causing the application to crash.
	<li>	Displaying reviews: The code should be updated to include code to display the reviews that have been submitted. This will allow users to see what other people have said about the books they are interested in.
	<li>	Other features: There are many other features that could be added to the code. Some ideas include:
	<li>	The ability to search for books
	<li>	The ability to add books to a wish list
	<li>	The ability to follow other users
	<li>	The ability to rate books
 </ol>
The code you provided is a good starting point for a more complete application. By adding additional features and error handling, you can create a useful and engaging website for book reviews.  
  
 
