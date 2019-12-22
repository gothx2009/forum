Suggested MySQL table setup
-------------------------------

If you do not use these names you will have to alter the source code.

Database < anything >


The below table is used for the categories that appear on the index page.
You must add Categories manually in the SQL DB.  The assumption is that these will stay more or less the same.

Table < cat ><br />
Rows in < cat ><br />
id	INT<br />
name	TEXT<br />
descr	TEXT<br />

Table < posts >
Rows in < posts >
content	TEXT
who	TEXT
topic	TEXT

Table < topics ><br />
subject	TEXT<br />
date	DATE<br />
cat	TEXT<br />
who	TEXT<br />
id	INT<br />

Table < user ><br />
level	INT<br />
active	INT<br />
username TEXT<br />
email	TEXT<br />
date	DATE<br />
password TEXT<br />
id	INT<br />

