-- Create the recipe database
CREATE DATABASE IF NOT EXISTS recipe_db;
USE recipe_db;

-- Create User table
CREATE TABLE IF NOT EXISTS User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    PostID INT,
    IsAdmin BOOLEAN DEFAULT FALSE
);

-- Create Post table
CREATE TABLE IF NOT EXISTS Post (
    PostID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    Recipe TEXT,
    Ingredient TEXT,
    Tag VARCHAR(100),
    FOREIGN KEY (UserID) REFERENCES User(UserID) ON DELETE CASCADE
);

-- Add foreign key constraint to User table
ALTER TABLE User
ADD CONSTRAINT fk_user_post
FOREIGN KEY (PostID) REFERENCES Post(PostID) ON DELETE SET NULL;

-- Create index for better performance
CREATE INDEX idx_post_userid ON Post(UserID);
CREATE INDEX idx_user_postid ON User(PostID);

