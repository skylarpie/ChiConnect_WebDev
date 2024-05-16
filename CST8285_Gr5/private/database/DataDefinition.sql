

-- Create a database called blog
CREATE DATABASE Blog ;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON Blog.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;


-- Use the created Blog database
USE Blog;


-- Create the Users table
CREATE TABLE IF NOT EXISTS Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(25) NOT NULL,
    FName VARCHAR(25) NOT NULL,
    LName VARCHAR(25) NOT NULL,
    email VARCHAR(75) NOT NULL,
    password VARCHAR(25) NOT NULL
);

-- Create the Authors table
CREATE TABLE IF NOT EXISTS Authors (
    AuthorID INT AUTO_INCREMENT PRIMARY KEY,
    AuthorName VARCHAR(35) NOT NULL
);

-- Create the Tags table
CREATE TABLE IF NOT EXISTS Tags (
    TagID INT AUTO_INCREMENT PRIMARY KEY,
    TagName VARCHAR(15) NOT NULL
);

-- Create the Blogs table
CREATE TABLE IF NOT EXISTS Blogs (
    BlogID INT AUTO_INCREMENT PRIMARY KEY,
    authorID INT,
    BlogTitle VARCHAR(50),
    BlogContent LONGTEXT,
    TagID INT,
    FOREIGN KEY (authorID) REFERENCES Authors(AuthorID),
    FOREIGN KEY (TagID) REFERENCES Tags(TagID)
);


-- Create the Comments table
CREATE TABLE IF NOT EXISTS Comments (
    CommentID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    blogID INT,
    commentContent TEXT,
    dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userID) REFERENCES Users(UserID),
    FOREIGN KEY (blogID) REFERENCES Blogs(BlogID)
);

-- Use to create Pictures table
CREATE TABLE Pictures (
    PictureID INT AUTO_INCREMENT PRIMARY KEY,
    BlogID INT,
    RelativePath VARCHAR(255) NOT NULL
);


