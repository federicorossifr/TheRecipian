USE recipian;

DROP TRIGGER IF EXISTS recipeSetCurrentDate;
CREATE TRIGGER recipeSetCurrentDate 
BEFORE INSERT ON recipes
FOR EACH ROW
    SET NEW.posted = SYSDATE();


DROP PROCEDURE IF EXISTS addRecipeCategory;
DROP PROCEDURE IF EXISTS addRecipeRecipient;
DELIMITER $$
CREATE PROCEDURE addRecipeCategory(IN recipe INT,IN category VARCHAR(255))
BEGIN
    DECLARE categoryExists INTEGER;
    
    SELECT C.id INTO categoryExists FROM categories C 
    WHERE C.name = category;
            
    IF(categoryExists IS NULL) THEN
        INSERT INTO categories(name) VALUES(category);
        SET categoryExists = LAST_INSERT_ID();
    END IF;
    
    INSERT INTO recipeCategories(recipe,category) VALUES(recipe,categoryExists);
END $$

CREATE PROCEDURE addRecipeRecipient(IN recipe INT,IN recipient VARCHAR(255),IN dosing INT,IN unit VARCHAR(255))
BEGIN
    DECLARE recipientExists INTEGER;
    
    SELECT R.id INTO recipientExists FROM recipients R
    WHERE R.name = recipient;
    
    IF(recipientExists IS NULL) THEN
        INSERT INTO recipients(name) VALUES(recipient);
        SET recipientExists = LAST_INSERT_ID();
    END IF;
    
    INSERT INTO recipeRecipients(recipe,recipient,dosing,unit) VALUES(recipe,recipientExists,dosing,unit);
END $$