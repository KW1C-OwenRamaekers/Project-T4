USE recipe_db;

INSERT INTO User (Username, Password)
VALUES ('testuser', 'password');

-- Now insert into the Post table with the valid UserID
INSERT INTO Post (UserID, Recipe, Ingredient, Tag)
VALUES ((SELECT UserID FROM User WHERE Username='testuser'), 'Test Recipe', 'Test Ingredient', 'Test Tag');

