import mysql.connector

# Create a connection to the database
connection = mysql.connector.connect(
  host="localhost",
  user="root",
  password="password",
  database="mydatabase"
)

# Create a cursor to execute queries
cursor = connection.cursor()

# Get the data from the form
username = request.form.get("username")
password = request.form.get("password")
email = request.form.get("email")

# Insert the data into the database
cursor.execute("INSERT INTO users (username, password, email) VALUES (%s, %s, %s)", (username, password, email))

# Commit the changes to the database
connection.commit()

# Close the connection to the database
cursor.close()
connection.close()