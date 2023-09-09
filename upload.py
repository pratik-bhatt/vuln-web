import sqlite3

# Connect to the SQLite database
conn = sqlite3.connect('your_database.db')
cursor = conn.cursor()

# Execute a query to retrieve data from the database
cursor.execute('SELECT * FROM users')
rows = cursor.fetchall()

# Process the retrieved data
for row in rows:
    print(row)

# Close the database connection
conn.close()
