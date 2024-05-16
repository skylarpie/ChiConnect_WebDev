USE Blog;
-- Insert 10 random records into the Blogs table


INSERT INTO Tags (TagName) VALUES
('Chihuahua'),
('Small Dog'),
('Toy Breed'),
('Cute'),
('Pet'),
('Companion Dog');

INSERT INTO Authors (AuthorName) VALUES
('Kyla Pineda'), ('John Hallam'), ('Kat Traviss');


INSERT INTO Blogs (authorID, BlogTitle, BlogContent, TagID) VALUES
(1, 'The Charming World of Chihuahuas', 'Chihuahuas are one of the most fascinating dog breeds, known for their small size and big personalities. Despite their diminutive stature, Chihuahuas possess an abundance of energy and a fearless attitude. Their expressive eyes and perky ears make them irresistible to many dog lovers. As a toy breed, they thrive on companionship and are often seen as delightful lap dogs. With their endearing features and playful nature, Chihuahuas easily capture the hearts of their owners and admirers alike.', 1),
(2, 'Small Dogs with Big Hearts: Exploring the Appeal of Toy Breeds', 'Small dogs, often referred to as toy breeds, have a special place in the hearts of dog enthusiasts. Their petite frames and charming personalities make them popular choices for pet owners living in apartments or smaller homes. Toy breeds like Chihuahuas, Pomeranians, and Yorkshire Terriers are adored for their compact size and affectionate nature. Despite their small stature, these dogs pack a punch with their loyalty and playful antics, proving that size is not a measure of love. Whether curled up on a cozy blanket or trotting alongside their owners, toy breeds bring joy and companionship to households around the world.', 2),
(3, 'The Endearing Charm of Toy Breeds: Why Small Dogs Rule the World', 'Toy breeds, also known as miniature or small dog breeds, hold a special place in the hearts of pet owners everywhere. From the tiny Chihuahua to the adorable Pomeranian, these pint-sized pups are full of personality and spunk. Their small size makes them perfect for city dwellers and those with limited space, but dont let their diminutive stature fool you - toy breeds are anything but delicate. With their playful demeanor and unwavering loyalty, these pint-sized companions prove that good things truly do come in small packages. Whether snuggled up on the couch or strutting their stuff at the dog park, toy breeds never fail to steal the spotlight and capture hearts wherever they go.', 3),
(1, 'Embracing the Cuteness: Why We Love Toy Breeds', 'When it comes to pets, few things rival the adorable charm of toy breeds. From their tiny paws to their perky ears, these diminutive dogs exude cuteness in every way. Whether its the playful antics of a Chihuahua or the fluffy charm of a Pomeranian, toy breeds have a way of melting hearts and bringing joy to those around them. As beloved companions, they offer unwavering loyalty and companionship, making them cherished members of the family. With their endearing personalities and lovable quirks, its no wonder that toy breeds hold a special place in the hearts of dog lovers everywhere.', 4),
(2, 'Unveiling the Pet Paradise: The Enchantment of Toy Breeds', 'In the world of pets, few things rival the enchanting allure of toy breeds. These pint-sized pups, including the popular Chihuahua and Pomeranian, captivate hearts with their adorable features and playful personalities. As cherished companions, they bring joy and laughter to households around the world. Despite their small size, toy breeds possess a big heart and boundless energy, making them perfect partners for both city dwellers and suburban families. With their infectious charm and unwavering devotion, toy breeds continue to reign supreme as beloved pets and faithful friends.', 5),
(3, 'Small But Mighty: The Irresistible Appeal of Toy Breeds', 'Toy breeds may be small in stature, but they are big on personality and charm. From the lively Chihuahua to the regal Pomeranian, these pint-sized pups have a way of stealing hearts wherever they go. With their playful antics and affectionate nature, toy breeds make wonderful companions for individuals and families alike. Whether snuggled up on the couch or out for a stroll in the park, these adorable dogs never fail to bring a smile to their owners faces. With their unwavering loyalty and endless love, its no wonder that toy breeds are cherished by dog lovers around the world.', 6),
(1, 'The Adorable Chihuahua: A Petite Companion', 'Chihuahuas, often referred to as the smallest dog breed, captivate hearts with their petite frames and big personalities. Their diminutive size makes them ideal for apartment living or as companions for those with limited space. Despite their small stature, Chihuahuas possess boundless energy, enjoying brisk walks and lively play sessions. Their endearing expressions and affectionate nature make them cherished pets for individuals and families alike.', 1),
(2, 'Small Dogs: Big Personalities in Compact Packages', 'Small dogs may be diminutive in size, but they possess personalities as vast as any larger breed. From the spirited Chihuahua to the feisty Yorkshire Terrier, these pint-sized companions pack a punch when it comes to love and loyalty. Their compact stature makes them perfect for cuddling on the couch or accompanying their owners on outdoor adventures. Small dogs often excel in agility and obedience training, proving that size is no barrier to intelligence or athleticism.', 2),
(3, 'Toy Breeds: Petite Pups with Plenty of Charm', 'Toy breeds enchant dog lovers with their adorable looks and playful dispositions. From the elegant Maltese to the lively Shih Tzu, these diminutive dogs bring joy to households around the world. Despite their small size, toy breeds often possess big personalities and are known for their spunky attitudes and affectionate nature. Whether lounging on laps or strutting their stuff in the show ring, toy breeds never fail to delight with their endearing antics.', 3),
(1, 'The Irresistible Appeal of Cute Dogs', 'Cute dogs have an undeniable allure that melts hearts and brings smiles to faces. From fluffy Pomeranians to charming Cavalier King Charles Spaniels, these adorable companions captivate with their sweet expressions and playful antics. Whether theyre romping in the park or snuggled up on the sofa, cute dogs radiate joy and bring happiness wherever they go. Their irresistible charm makes them beloved pets and cherished members of the family.', 4);

-- Check if the inserts were successful
SELECT * FROM Blogs;


-- Insert 10 random records into the Users table
INSERT INTO Users (UserName, FName, LName, email, password) VALUES
('user1', 'John', 'Doe', 'john.doe@example.com', 'password1'),
('user2', 'Jane', 'Smith', 'jane.smith@example.com', 'password2'),
('user3', 'Michael', 'Johnson', 'michael.johnson@example.com', 'password3'),
('user4', 'Emily', 'Brown', 'emily.brown@example.com', 'password4'),
('user5', 'Daniel', 'Davis', 'daniel.davis@example.com', 'password5'),
('user6', 'Sarah', 'Wilson', 'sarah.wilson@example.com', 'password6'),
('user7', 'David', 'Martinez', 'david.martinez@example.com', 'password7'),
('user8', 'Emma', 'Taylor', 'emma.taylor@example.com', 'password8'),
('user9', 'Matthew', 'Anderson', 'matthew.anderson@example.com', 'password9'),
('user10', 'Olivia', 'Thomas', 'olivia.thomas@example.com', 'password10');

-- Insert into the Comments table
INSERT INTO Comments (userID, blogID, commentContent) VALUES
(1, 1, 'Great blog! I love learning about Chihuahuas.'),
(2, 2, 'I agree, small dogs are the best!'),
(3, 3, 'Toy breeds are so adorable.'),
(4, 4, 'Cuteness overload!'),
(5, 5, 'I have a small dog too, they are wonderful companions.'),
(6, 6, 'I enjoyed reading this blog, thank you!');

-- Use to insert information into the Pictures table
INSERT INTO Pictures (BlogID, RelativePath) VALUES
(1, '../public/images/1.jpg'),
(2, '../public/images/2.jpg'),
(3, '../public/images/3.jpg'),
(4, '../public/images/4.jpg'),
(5, '../public/images/5.jpg'),
(6, '../public/images/6.jpg'),
(7, '../public/images/7.jpg'),
(8, '../public/images/8.jpg'),
(9, '../public/images/9.jpg'),
(10, '../public/images/10.jpg');

