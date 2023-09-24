

-- Table structure for table 'users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255),
    is_admin BOOLEAN DEFAULT 0

);

<<<<<<< Updated upstream
-- INSERT INTO users (username, password, email, profile_pic, is_admin)
-- VALUES ('gurjas_gandhi_', 'Gsg@1999', 'gurjasgandhi76@gmail.com', 'admin.jpg', 1);
=======
INSERT INTO users (username, password, email, profile_pic, is_admin)
VALUES ('gurjas_gandhi_', 'Gsg@1999(hashed)', 'gurjasgandhi76@gmail.com', 'VOTIFY/img/profile_pic.jpg', 1);
>>>>>>> Stashed changes



-- Table structure for table `chatbot`
--

-- Table structure for table `otp_recovery`
--

DROP TABLE IF EXISTS `otp_recovery`;
CREATE TABLE IF NOT EXISTS `otp_recovery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `otp` varchar(6) NOT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `otp` (`otp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



-- Create the Elections table
CREATE TABLE Elections (
    election_id INT AUTO_INCREMENT PRIMARY KEY,
    election_name VARCHAR(255),
    election_date DATE
);

-- Create the Candidates table
CREATE TABLE Candidates (
    candidate_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    image VARCHAR(255)
);

-- Create the PollingLocations table
CREATE TABLE PollingLocations (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255)
);

-- Create the ElectionCandidates table to associate elections with candidates
CREATE TABLE ElectionCandidates (
    election_id INT,
    candidate_id INT,
    FOREIGN KEY (election_id) REFERENCES Elections(election_id),
    FOREIGN KEY (candidate_id) REFERENCES Candidates(candidate_id)
);

-- Create the ElectionLocations table to associate elections with polling locations
CREATE TABLE ElectionLocations (
    election_id INT,
    location_id INT,
    FOREIGN KEY (election_id) REFERENCES Elections(election_id),
    FOREIGN KEY (location_id) REFERENCES PollingLocations(location_id)
);

-- Insert data into the Elections table
INSERT INTO Elections (election_name, election_date)
VALUES
    ('Local Election 2023', '2023-11-15'),
    ('State Assembly Election 2023', '2023-05-10'),
    ('Municipal Election 2024', '2024-08-20'),
    ('Lok Sabha Election 2024', '2024-04-05'),
    ('Panchayat Election 2025', '2025-09-15'),
    ('Municipal Corporation Election 2026', '2026-06-30'),
    ('Rajya Sabha Election 2027', '2027-03-25'),
    ('Zila Parishad Election 2028', '2028-11-10');

-- Insert data into the Candidates table
INSERT INTO Candidates (name, image)
VALUES
    ('Sharad Pawar', 'candidate_images/candidate1.jpg'),
    ('Nikhilkumar Thakor', 'candidate_images/candidate2.jpg'),
    ('Mukesh Singh', 'candidate_images/candidate3.jpg'),
    ('Shekhar Nikam', 'candidate_images/candidate4.jpg'),
    ('Arvind Kejriwal', 'candidate_images/candidate5.jpg'),
    ('Jagdish Chander', 'candidate_images/candidate6.jpg'),
    ('Sushma Kharkwal', 'candidate_images/candidate7.jpg'),
    ('Bijoy Malakar', 'candidate_images/candidate8.jpg'),
    ('Ashok Bendalam', 'candidate_images/candidate9.jpg'),
    ('Narendra Modi', 'candidate_images/candidate10.jpg'),
    ('Rahul Gandhi', 'candidate_images/candidate11.jpg'),
    ('Mamata Banerjee', 'candidate_images/candidate12.jpg'),
    ('Ganesh Choudhari', 'candidate_images/candidate13.jpg'),
    ('Jayanti Naik', 'candidate_images/candidate14.jpg'),
    ('Gnani Sankaran', 'candidate_images/candidate15.jpg'),
    ('Jyoti Kalamkar', 'candidate_images/candidate16.jpg'),
    ('Rekha Gupta', 'candidate_images/candidate17.jpg'),
    ('Atmaram Tripathi', 'candidate_images/candidate18.jpg'),
    ('Vivek Thakur', 'candidate_images/candidate19.jpg'),
    ('Sanjay Singh', 'candidate_images/candidate20.jpg'),
    ('Sharad Pawar', 'candidate_images/candidate1.jpg'),
    ('Abhijit Tambile', 'candidate_images/candidate21.jpg'),
    ('Amit Chavhan', 'candidate_images/candidate22.jpg'),
    ('Anant Sawant', 'ccandidate_images/candidate23.jpg');

-- Insert data into the PollingLocations table
INSERT INTO PollingLocations (location_name)
VALUES
    ('Pune'),
    ('Gujarat'),
    ('Delhi'),
    ('Maharashtra'),
    ('Rajasthan'),
    ('Lucknow'),
    ('Assam'),
    ('Andhra Pradesh'),
    ('Madhya Pradesh'),
    ('Bihar'),
    ('Ahmednagar'),
    ('Ratnagiri');

-- Insert data into the ElectionCandidates table to associate elections with candidates
-- Use the appropriate election_id and candidate_id values for each election-candidate pair
-- Insert data into the ElectionCandidates table
-- For the "Local Election 2023"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (1, 1),  -- Sharad Pawar
    (1, 2),  -- Nikhilkumar Thakor
    (1, 3);  -- Mukesh Singh

-- For the "State Assembly Election 2023"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (2, 4),  -- Shekhar Nikam
    (2, 5),  -- Arvind Kejriwal
    (2, 6);  -- Jagdish Chander

-- For the "Municipal Election 2024"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (3, 7),  -- Sushma Kharkwal
    (3, 8),  -- Bijoy Malakar
    (3, 9);  -- Ashok Bendalam

-- For the "Lok Sabha Election 2024"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (4, 10),  -- Narendra Modi
    (4, 11),  -- Rahul Gandhi
    (4, 12);  -- Mamata Banerjee

-- For the "Panchayat Election 2025"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (5, 13),  -- Ganesh Choudhari
    (5, 14),  -- Jayanti Naik
    (5, 15);  -- Gnani Sankaran

-- For the "Municipal Corporation Election 2026"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (6, 16),  -- Jyoti Kalamkar
    (6, 17),  -- Rekha Gupta
    (6, 18);  -- Atmaram Tripathi

-- For the "Rajya Sabha Election 2027"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (7, 19),  -- Vivek Thakur
    (7, 20),  -- Sanjay Singh
    (7, 1);   -- Sharad Pawar

-- For the "Zila Parishad Election 2028"
INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (8, 21),  -- Abhijit Tambile
    (8, 22),  -- Amit Chavhan
    (8, 23);  -- Anant Sawant


-- Insert data into the ElectionLocations table to associate elections with polling locations
-- Use the appropriate election_id and location_id values for each election-location pair
-- Insert data into the ElectionLocations table
-- For the "Local Election 2023"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (1, 1),  -- Pune
    (1, 2),  -- Gujarat
    (1, 3);  -- Delhi

-- For the "State Assembly Election 2023"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (2, 4),  -- Maharashtra
    (2, 2),  -- Gujarat
    (2, 5);  -- Rajasthan

-- For the "Municipal Election 2024"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (3, 6),  -- Lucknow
    (3, 7),  -- Assam
    (3, 8);  -- Andhra Pradesh

-- For the "Lok Sabha Election 2024"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (4, 2),   -- Gujarat
    (4, 9),   -- Madhya Pradesh
    (4, 4);   -- Maharashtra

-- For the "Panchayat Election 2025"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (5, 1),   -- Pune
    (5, 10),  -- Goa
    (5, 11);  -- Tamil Nadu

-- For the "Municipal Corporation Election 2026"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (6, 1),   -- Pune
    (6, 3),   -- Delhi
    (6, 12);  -- Surat

-- For the "Rajya Sabha Election 2027"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (7, 13),  -- Bihar
    (7, 3),   -- Delhi
    (7, 1);   -- Pune

-- For the "Zila Parishad Election 2028"
INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (8, 1),   -- Pune
    (8, 14),  -- Ahmednagar
    (8, 15);  -- Ratnagiri


-- ADD ADMIN LOGIN TABLE WITH EMAIL ID INCLUDED
CREATE TABLE admin_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_username VARCHAR(255) NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    admin_profile_pic VARCHAR(255)
);

-- INSERT VALUES INTO ADMIN LOGIN TABLE
INSERT INTO admin_login (admin_username, admin_password, admin_email, admin_profile_pic)
VALUES
    ('admin', 'admin', 'gurjasgandhi76@gmail.com', 'admin.png');

    -- Create a table to store user responses and bot responses
-- CREATE TABLE chat_history (
  --  id INT AUTO_INCREMENT PRIMARY KEY,
   -- user_message TEXT,
   -- bot_response TEXT,
    -- timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- Create a table to store sample bot responses
-- CREATE TABLE sample_bot_responses (
   -- id INT AUTO_INCREMENT PRIMARY KEY,
   -- response_text TEXT
-- );

-- Table for user messages
CREATE TABLE user_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for bot responses
CREATE TABLE bot_responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

