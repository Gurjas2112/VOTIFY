

-- Table structure for table 'users
CREATE TABLE users (
    id INT AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255),
    is_admin BOOLEAN DEFAULT 0,
    `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
 
  `Age` int DEFAULT NULL,
  `Address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
`PhoneNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `RegistrationStatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `City` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `State` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AadharCard` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adhardoc` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photodoc` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signdoc` varchar(400) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `PhoneNumber` (`PhoneNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERT INTO users (username, password, email, profile_pic, is_admin)
-- VALUES ('gurjas_gandhi_', 'Gsg@1999', 'gurjasgandhi76@gmail.com', 'admin.jpg', 1);

-- INSERT INTO users (username, password, email, profile_pic, is_admin)
-- VALUES ('gurjas_gandhi_', 'Gsg@1999', 'gurjasgandhi76@gmail.com', 'img/profile_pic.jpg', 1);






DROP TABLE IF EXISTS `otp_recovery`;
DROP TABLE IF EXISTS `otp_recovery`;
CREATE TABLE IF NOT EXISTS `otp_recovery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otp` varchar(6) NOT NULL,
  `is_expired` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `otp` (`otp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (1, 1),  
    (1, 2),  
    (1, 3);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (2, 4),  
    (2, 5),  
    (2, 6);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (3, 7),  
    (3, 8),  
    (3, 9);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (4, 10),  
    (4, 11), 
    (4, 12);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (5, 13),  
    (5, 14),  
    (5, 15);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (6, 16),  
    (6, 17),  
    (6, 18);  


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (7, 19),  
    (7, 20),  
    (7, 1);   


INSERT INTO ElectionCandidates (election_id, candidate_id)
VALUES
    (8, 21), 
    (8, 22),  
    (8, 23);  



INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (1, 1), 
    (1, 2),  
    (1, 3); 


INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (2, 4), 
    (2, 2), 
    (2, 5);  


INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (3, 6),  
    (3, 7),  
    (3, 8); 


INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (4, 2),  
    (4, 9),   
    (4, 4);  


INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (5, 1),  
    (5, 10),
    (5, 11); 

INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (6, 1),  
    (6, 3),   
    (6, 12);  

INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (7, 13),  
    (7, 3),   
    (7, 1);


INSERT INTO ElectionLocations (election_id, location_id)
VALUES
    (8, 1),  
    (8, 14),  
    (8, 15);  



CREATE TABLE admin_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_username VARCHAR(255) NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    admin_profile_pic VARCHAR(255)
);


INSERT INTO admin_login (admin_username, admin_password, admin_email, admin_profile_pic)
VALUES
    ('admin', 'admin', 'gurjasgandhi76@gmail.com', 'admin.png');



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

CREATE TABLE states (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Insert all the states of India into the "states" table
INSERT INTO states (name) VALUES
    ('Andaman and Nicobar Islands'), 
    ('Andhra Pradesh'),
    ('Arunachal Pradesh'),
    ('Assam'),
    ('Bihar'),
    ('Chandigarh'), 
    ('Chhattisgarh'),
    ('Dadra and Nagar Haveli'),
    ('Daman and Diu'),
    ('Delhi'),
    ('Goa'),
    ('Gujarat'),
    ('Haryana'),
    ('Himachal Pradesh'), 
    ('Jammu and Kashmir'),
    ('Jharkhand'), 
    ('Karnataka'), 
    ('Kerala'),
    ('Lakshadweep'),
    ('Madhya Pradesh'),
    ('Manipur'),
    ('Meghalaya'),
    ('Mizoram'),
     ('Maharashtra'),
    ('Nagaland'),
    ('Odisha'),
    ('Puducherry'),
    ('Punjab'),
    ('Rajasthan'),
    ('Sikkim'),
    ('Tamil Nadu'),
    ('Telangana'),
    ('Tripura'),
    ('Uttar Pradesh'),
    ('Uttarakhand'),
    ('West Bengal');

    -- Create the "cities" table
CREATE TABLE cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    state_id INT,
    FOREIGN KEY (state_id) REFERENCES states(id)
);

-- Insert cities for the state "Andaman and Nicobar Islands"
-- Insert more cities for the state "Andaman and Nicobar Islands"
INSERT INTO cities (name, state_id) VALUES
    ('Port Blair', 1),
    ('Car Nicobar', 1),
    ('Hut Bay', 1),
    ('Rangat', 1),
    ('Mayabunder', 1),
    ('Diglipur', 1),
    ('Little Andaman', 1),
    ('Long Island', 1),
    ('Neil Island', 1),
    ('Wandoor', 1),
    ('Bamboo Flat', 1),
    ('Ferrargunj', 1);
  
  
-- Insert more cities for the state "Andhra Pradesh"
INSERT INTO cities (name, state_id) VALUES
    ('Hyderabad', 2),
    ('Visakhapatnam', 2),
    ('Vijayawada', 2),
    ('Guntur', 2),
    ('Nellore', 2),
    ('Kurnool', 2),
    ('Rajahmundry', 2),
    ('Tirupati', 2),
    ('Eluru', 2),
    ('Kakinada', 2),
    ('Anantapur', 2),
    ('Chittoor', 2),
    ('Kadapa', 2),
    ('Vizianagaram', 2),
    ('Tenali', 2),
    ('Proddatur', 2),
    ('Machilipatnam', 2),
    ('Adoni', 2),
    ('Srikakulam', 2),
    ('Guntakal', 2),
    ('Hindupur', 2),
    ('Nandyal', 2),
    ('Madanapalle', 2),
    ('Chilakaluripet', 2);

-- Insert more cities for the state "Arunachal Pradesh"
INSERT INTO cities (name, state_id) VALUES
    ('Itanagar', 3),
    ('Naharlagun', 3),
    ('Tawang', 3),
    ('Bomdila', 3),
    ('Along', 3),
    ('Pasighat', 3),
    ('Roing', 3),
    ('Ziro', 3),
    ('Tezu', 3),
    ('Daporijo', 3),
    ('Aalo', 3),
    ('Namsai', 3),
    ('Hayuliang', 3),
    ('Changlang', 3),
    ('Khonsa', 3),
    ('Mechuka', 3),
    ('Tuting', 3),
    ('Bhalukpong', 3),
    ('Dibang', 3),
    ('Hawai', 3),
    ('Miao', 3),
    ('Nacho', 3);

-- Insert more cities for the state "Assam"
INSERT INTO cities (name, state_id) VALUES
    ('Guwahati', 4),
    ('Silchar', 4),
    ('Dibrugarh', 4),
    ('Jorhat', 4),
    ('Nagaon', 4),
    ('Tezpur', 4),
    ('Tinsukia', 4),
    ('Barpeta', 4),
    ('Sivasagar', 4),
    ('Goalpara', 4),
    ('Karimganj', 4),
    ('Hailakandi', 4),
    ('Bongaigaon', 4),
    ('Nalbari', 4),
    ('Dhubri', 4),
    ('Kokrajhar', 4),
    ('Lakhimpur', 4),
    ('Dhemaji', 4),
    ('Dima Hasao', 4),
    ('Morigaon', 4),
    ('Darrang', 4),
    ('Baksa', 4),
    ('Chirang', 4),
    ('Kamrup', 4),
    ('Kamrup Metropolitan', 4),
    ('Nagaon', 4),
    ('Nalbari', 4),
    ('Kokrajhar', 4),
    ('Baksa', 4),
    ('Sonitpur', 4);
 

 -- Insert more cities for the state "Bihar"
INSERT INTO cities (name, state_id) VALUES
    ('Patna', 5),
    ('Gaya', 5),
    ('Bhagalpur', 5),
    ('Muzaffarpur', 5),
    ('Purnia', 5),
    ('Darbhanga', 5),
    ('Bihar Sharif', 5),
    ('Arrah', 5),
    ('Sasaram', 5),
    ('Hajipur', 5),
    ('Siwan', 5),
    ('Motihari', 5),
    ('Nawada', 5),
    ('Bagaha', 5),
    ('Buxar', 5),
    ('Kishanganj', 5),
    ('Sitamarhi', 5),
    ('Jamalpur', 5),
    ('Chhapra', 5),
    ('Danapur', 5),
    ('Saharsa', 5),
    ('Dumraon', 5),
    ('Madhubani', 5),
    ('Gopalganj', 5),
    ('Katihar', 5),
    ('Masaurhi', 5),
    ('Munger', 5);

-- Insert cities for the union territory "Chandigarh"
INSERT INTO cities (name, state_id) VALUES
    ('Chandigarh', 6);

    -- Insert more cities for the state "Chhattisgarh"
INSERT INTO cities (name, state_id) VALUES
    ('Raipur', 7),
    ('Bhilai', 7),
    ('Bilaspur', 7),
    ('Korba', 7),
    ('Durg', 7),
    ('Raigarh', 7),
    ('Jagdalpur', 7),
    ('Ambikapur', 7),
    ('Chirmiri', 7),
    ('Dhamtari', 7),
    ('Mahasamund', 7),
    ('Rajnandgaon', 7),
    ('Kanker', 7),
    ('Surajpur', 7),
    ('Baloda Bazar', 7),
    ('Gariaband', 7),
    ('Janjgir', 7),
    ('Koriya', 7),
    ('Sukma', 7),
    ('Dantewada', 7),
    ('Narayanpur', 7),
    ('Kondagaon', 7),
    ('Bijapur', 7),
    ('Bemetara', 7),
    ('Balod', 7),
    ('Mungeli', 7),
    ('Kawardha', 7),
    ('Durg-Bhilai Nagar', 7);
   

 -- Insert cities for the union territory "Dadra and Nagar Haveli"
INSERT INTO cities (name, state_id) VALUES
    ('Silvassa', 8);

-- Insert cities for the union territory "Daman and Diu"
INSERT INTO cities (name, state_id) VALUES
    ('Daman', 9),
    ('Diu', 9);

-- Insert more cities for the National Capital Territory of Delhi
INSERT INTO cities (name, state_id) VALUES
    ('New Delhi', 10),
    ('Old Delhi', 10),
    ('Noida', 10),
    ('Gurgaon', 10),
    ('Faridabad', 10),
    ('Dwarka', 10),
    ('Lajpat Nagar', 10),
    ('Connaught Place', 10),
    ('Karol Bagh', 10),
    ('Saket', 10),
    ('Rohini', 10),
    ('Pitampura', 10),
    ('Mayur Vihar', 10),
    ('Vasant Kunj', 10),
    ('Greater Kailash', 10),
    ('Chanakyapuri', 10),
    ('Paharganj', 10),
    ('Vikaspuri', 10);
-- Insert more cities for the state of "Goa"
INSERT INTO cities (name, state_id) VALUES
    ('Panaji', 11),
    ('Margao', 11),
    ('Vasco da Gama', 11),
    ('Mapusa', 11),
    ('Ponda', 11),
    ('Bicholim', 11),
    ('Curchorem', 11),
    ('Canacona', 11),
    ('Quepem', 11),
    ('Sanguem', 11),
    ('Valpoi', 11),
    ('Dharbandora', 11),
    ('Cortalim', 11),
    ('Sanquelim', 11),
    ('Pernem', 11),
    ('Cuncolim', 11),
    ('Mormugao', 11),
    ('Salcete', 11);
   
-- Insert more cities for the state of "Gujarat"
INSERT INTO cities (name, state_id) VALUES
    ('Ahmedabad', 12),
    ('Surat', 12),
    ('Vadodara', 12),
    ('Rajkot', 12),
    ('Bhavnagar', 12),
    ('Jamnagar', 12),
    ('Junagadh', 12),
    ('Gandhinagar', 12),
    ('Anand', 12),
    ('Nadiad', 12),
    ('Bharuch', 12),
    ('Mehsana', 12),
    ('Patan', 12),
    ('Gandhidham', 12),
    ('Bhuj', 12),
    ('Porbandar', 12),
    ('Surendranagar', 12),
    ('Godhra', 12),
    ('Navsari', 12),
    ('Ankleshwar', 12),
    ('Dahod', 12),
    ('Valsad', 12),
    ('Botad', 12),
    ('Veraval', 12),
    ('Mangrol', 12),
    ('Dholka', 12),
    ('Kadi', 12),
    ('Modasa', 12),
    ('Palanpur', 12),
    ('Sidhpur', 12),
    ('Unjha', 12),
    ('Dhoraji', 12),
    ('Jetpur', 12);

-- Insert more cities for the state of "Haryana"
INSERT INTO cities (name, state_id) VALUES
    ('Chandigarh', 13),
    ('Faridabad', 13),
    ('Gurugram', 13),
    ('Panipat', 13),
    ('Ambala', 13),
    ('Yamunanagar', 13),
    ('Karnal', 13),
    ('Hisar', 13),
    ('Rohtak', 13),
    ('Sonipat', 13),
    ('Panchkula', 13),
    ('Bhiwani', 13),
    ('Sirsa', 13),
    ('Kaithal', 13),
    ('Jind', 13),
    ('Fatehabad', 13),
    ('Mahendragarh', 13),
    ('Palwal', 13),
    ('Rewari', 13),
    ('Narnaul', 13),
    ('Kurukshetra', 13),
    ('Jhajjar', 13),
    ('Charkhi Dadri', 13);

-- Insert more cities for the state of "Himachal Pradesh"
INSERT INTO cities (name, state_id) VALUES
    ('Shimla', 14),
    ('Mandi', 14),
    ('Solan', 14),
    ('Dharamshala', 14),
    ('Kullu', 14),
    ('Chamba', 14),
    ('Una', 14),
    ('Bilaspur', 14),
    ('Hamirpur', 14),
    ('Nahan', 14),
    ('Sirmaur', 14),
    ('Kangra', 14),
    ('Palampur', 14),
    ('Mehatpur', 14),
    ('Kasauli', 14),
    ('Nurpur', 14),
    ('Sundarnagar', 14),
    ('Kumarhatti', 14),
    ('Rampur', 14),
    ('Baddi', 14),
    ('Nalagarh', 14),
    ('Rohru', 14),
    ('Bhuntar', 14),
    ('Joginder Nagar', 14),
    ('Chail', 14),
    ('Baijnath', 14),
    ('Mashobra', 14),
    ('Kalpa', 14),
    ('Rakkar', 14),
    ('Sarkaghat', 14),
    ('Tatapani', 14),
    ('Jubbal', 14);

-- Insert more cities for the state of "Jammu and Kashmir"
INSERT INTO cities (name, state_id) VALUES
    ('Srinagar', 15),
    ('Jammu', 15),
    ('Anantnag', 15),
    ('Baramulla', 15),
    ('Udhampur', 15),
    ('Kathua', 15),
    ('Samba', 15),
    ('Rajouri', 15),
    ('Pulwama', 15),
    ('Kupwara', 15),
    ('Doda', 15),
    ('Kishtwar', 15),
    ('Ramban', 15),
    ('Leh', 15),
    ('Kargil', 15),
    ('Pahalgam', 15),
    ('Gulmarg', 15),
    ('Bandipora', 15),
    ('Shopian', 15),
    ('Reasi', 15),
    ('Katra', 15),
    ('Poonch', 15),
    ('Bhaderwah', 15),
    ('Sopore', 15),
    ('Budgam', 15),
    ('Ganderbal', 15);

-- Insert more cities for the state of "Jharkhand"
INSERT INTO cities (name, state_id) VALUES
    ('Ranchi', 16),
    ('Jamshedpur', 16),
    ('Dhanbad', 16),
    ('Bokaro Steel City', 16),
    ('Hazaribagh', 16),
    ('Deoghar', 16),
    ('Giridih', 16),
    ('Ramgarh', 16),
    ('Chatra', 16),
    ('Godda', 16),
    ('Sahebganj', 16),
    ('Pakur', 16),
    ('Dumka', 16),
    ('Jamtara', 16),
    ('Koderma', 16),
    ('Lohardaga', 16),
    ('Gumla', 16),
    ('Simdega', 16),
    ('Latehar', 16),
    ('Seraikela', 16),
    ('Khunti', 16),
    ('Hazaribagh', 16),
    ('Palamu', 16),
    ('Hazaribagh', 16),
    ('Ranchi', 16),
    ('Dhanbad', 16),
    ('Jamshedpur', 16),
    ('Bokaro Steel City', 16),
    ('Hazaribagh', 16),
    ('Deoghar', 16),
    ('Giridih', 16),
    ('Ramgarh', 16),
    ('Chatra', 16),
    ('Godda', 16),
    ('Sahebganj', 16),
    ('Pakur', 16),
    ('Dumka', 16),
    ('Jamtara', 16),
    ('Koderma', 16),
    ('Lohardaga', 16),
    ('Gumla', 16),
    ('Simdega', 16),
    ('Latehar', 16),
    ('Seraikela', 16),
    ('Khunti', 16),
    ('Hazaribagh', 16),
    ('Palamu', 16);

-- Insert more cities for the state of "Karnataka"
INSERT INTO cities (name, state_id) VALUES
    ('Bangalore', 17),
    ('Mysore', 17),
    ('Hubli', 17),
    ('Mangalore', 17),
    ('Belgaum', 17),
    ('Gulbarga', 17),
    ('Davanagere', 17),
    ('Bellary', 17),
    ('Tumkur', 17),
    ('Shimoga', 17),
    ('Udupi', 17),
    ('Bijapur', 17),
    ('Bagalkot', 17),
    ('Raichur', 17),
    ('Bidar', 17),
    ('Hassan', 17),
    ('Dharwad', 17),
    ('Kolar', 17),
    ('Karwar', 17),
    ('Chitradurga', 17),
    ('Haveri', 17),
    ('Gadag', 17),
    ('Chikkamagaluru', 17),
    ('Ramanagara', 17),
    ('Mandya', 17),
    ('Chamarajanagar', 17),
    ('Koppal', 17),
    ('Bengaluru Rural', 17),
    ('Yadgir', 17),
    ('Vijayapura', 17),
    ('Kodagu', 17),
    ('Dakshina Kannada', 17),
    ('Uttara Kannada', 17),
    ('Tumakuru', 17),
    ('Chikballapur', 17),
    ('Ramanagara', 17);
 
 -- Insert more cities for the state of "Kerala"
INSERT INTO cities (name, state_id) VALUES
    ('Thiruvananthapuram', 18),
    ('Kochi', 18),
    ('Kozhikode', 18),
    ('Kollam', 18),
    ('Thrissur', 18),
    ('Kannur', 18),
    ('Kottayam', 18),
    ('Alappuzha', 18),
    ('Palakkad', 18),
    ('Malappuram', 18),
    ('Pathanamthitta', 18),
    ('Idukki', 18),
    ('Wayanad', 18),
    ('Kasaragod', 18),
    ('Trivandrum', 18),
    ('Ernakulam', 18),
    ('Calicut', 18),
    ('Kozhikode', 18),
    ('Alleppey', 18),
    ('Kollam', 18),
    ('Kottayam', 18),
    ('Kannur', 18),
    ('Kasaragod', 18),
    ('Thodupuzha', 18),
    ('Pala', 18),
    ('Attingal', 18),
    ('Changanassery', 18),
    ('Palakkad', 18),
    ('Malappuram', 18),
    ('Manjeri', 18),
    ('Perinthalmanna', 18),
    ('Kottakkal', 18);

-- Insert more cities for the Union Territory of "Lakshadweep"
INSERT INTO cities (name, state_id) VALUES
    ('Kavaratti', 19),
    ('Agatti Island', 19),
    ('Amini', 19),
    ('Andrott', 19),
    ('Bitra', 19),
    ('Chetlat', 19),
    ('Kadmat', 19),
    ('Kalapeni', 19),
    ('Kilthan', 19),
    ('Lakshadweep', 19),
    ('Minicoy', 19),
    ('Pitti', 19),
    ('Suheli Par', 19),
    ('Bangaram', 19),
    ('Thinnakara', 19),
    ('Kiltan', 19),
    ('Agatti', 19),
    ('Chetlat', 19),
    ('Amini', 19),
    ('Andrott', 19),
    ('Bitra', 19),
    ('Kadmat', 19),
    ('Kalapeni', 19),
    ('Kilthan', 19),
    ('Suheli Par', 19),
    ('Bangaram', 19),
    ('Thinnakara', 19),
    ('Kiltan', 19),
    ('Agatti', 19);
  
  -- Insert more cities for the state of "Madhya Pradesh"
INSERT INTO cities (name, state_id) VALUES
    ('Bhopal', 20),
    ('Indore', 20),
    ('Jabalpur', 20),
    ('Gwalior', 20),
    ('Ujjain', 20),
    ('Sagar', 20),
    ('Dewas', 20),
    ('Satna', 20),
    ('Ratlam', 20),
    ('Rewa', 20),
    ('Murwara (Katni)', 20),
    ('Singrauli', 20),
    ('Burhanpur', 20),
    ('Khandwa', 20),
    ('Morena', 20),
    ('Bhind', 20),
    ('Shivpuri', 20),
    ('Vidisha', 20),
    ('Chhindwara', 20),
    ('Guna', 20),
    ('Damoh', 20),
    ('Mandsaur', 20),
    ('Khargone', 20),
    ('Neemuch', 20),
    ('Pithampur', 20),
    ('Itarsi', 20),
    ('Hoshangabad', 20),
    ('Ashoknagar', 20),
    ('Shajapur', 20),
    ('Sehore', 20),
    ('Raisen', 20),
    ('Harda', 20),
    ('Betul', 20);
  
  -- Insert more cities for the state of "Manipur"
INSERT INTO cities (name, state_id) VALUES
    ('Imphal', 21),
    ('Thoubal', 21),
    ('Bishnupur', 21),
    ('Churachandpur', 21),
    ('Senapati', 21),
    ('Ukhrul', 21),
    ('Chandel', 21),
    ('Tamenglong', 21),
    ('Kakching', 21),
    ('Jiribam', 21),
    ('Noney', 21),
    ('Pherzawl', 21),
    ('Kangpokpi', 21),
    ('Tengnoupal', 21),
    ('Kamjong', 21),
    ('Kangpokpi', 21),
    ('Tengnoupal', 21),
    ('Kamjong', 21),
    ('Pherzawl', 21),
    ('Tamei', 21),
    ('Thinghat', 21),
    ('Kasom Khullen', 21),
    ('Mao', 21),
    ('Maram', 21),
    ('Moirang', 21),
    ('Moreh', 21),
    ('Nambol', 21);

-- Insert more cities for the state of "Meghalaya"
INSERT INTO cities (name, state_id) VALUES
    ('Shillong', 22),
    ('Tura', 22),
    ('Jowai', 22),
    ('Nongstoin', 22),
    ('Baghmara', 22),
    ('Williamnagar', 22),
    ('Resubelpara', 22),
    ('Nongpoh', 22),
    ('Mawkyrwat', 22),
    ('Khliehriat', 22),
    ('Amlarem', 22),
    ('Mairang', 22),
    ('Cherrapunjee', 22),
    ('Nongpoh', 22),
    ('Shillong', 22),
    ('Tura', 22),
    ('Jowai', 22),
    ('Nongstoin', 22),
    ('Baghmara', 22),
    ('Williamnagar', 22),
    ('Resubelpara', 22),
    ('Nongpoh', 22),
    ('Mawkyrwat', 22),
    ('Khliehriat', 22),
    ('Amlarem', 22),
    ('Mairang', 22),
    ('Cherrapunjee', 22),
    ('Nongpoh', 22),
    ('Shillong', 22);
  
  -- Insert more cities for the state of "Mizoram"
INSERT INTO cities (name, state_id) VALUES
    ('Aizawl', 23),
    ('Lunglei', 23),
    ('Saiha', 23),
    ('Champhai', 23),
    ('Kolasib', 23),
    ('Serchhip', 23),
    ('Lawngtlai', 23),
    ('Mamit', 23),
    ('Khawzawl', 23),
    ('Hnahthial', 23),
    ('Saitual', 23),
    ('Thawngtlang', 23),
    ('Biate', 23),
    ('Sairang', 23),
    ('Darlawn', 23),
    ('Phullen', 23),
    ('Thehlep', 23),
    ('Kawnpui', 23),
    ('Tlabung', 23),
    ('East Lungdar', 23);
  
  -- Insert more cities for the state of "Maharashtra"
INSERT INTO cities (name, state_id) VALUES
    ('Mumbai', 24),
    ('Pune', 24),
    ('Nagpur', 24),
    ('Thane', 24),
    ('Nashik', 24),
    ('Aurangabad', 24),
    ('Solapur', 24),
    ('Amravati', 24),
    ('Kolhapur', 24),
    ('Latur', 24),
    ('Akola', 24),
    ('Ahmednagar', 24),
    ('Jalgaon', 24),
    ('Dhule', 24),
    ('Nanded', 24),
    ('Satara', 24),
    ('Sangli', 24),
    ('Chandrapur', 24),
    ('Parbhani', 24),
    ('Yavatmal', 24),
    ('Osmanabad', 24),
    ('Jalna', 24),
    ('Raigad', 24),
    ('Ratnagiri', 24),
    ('Sindhudurg', 24),
    ('Palghar', 24),
    ('Wardha', 24),
    ('Hingoli', 24),
    ('Gondia', 24),
    ('Washim', 24),
    ('Buldhana', 24),
    ('Chiplun', 24),
    ('Ichalkaranji', 24),
    ('Karad', 24),
    ('Sangamner', 24),
    ('Talegaon Dabhade', 24);
   
   -- Insert more cities for the state of "Nagaland"
INSERT INTO cities (name, state_id) VALUES
    ('Kohima', 25),
    ('Dimapur', 25),
    ('Mokokchung', 25),
    ('Tuensang', 25),
    ('Wokha', 25),
    ('Zunheboto', 25),
    ('Phek', 25),
    ('Mon', 25),
    ('Kiphire', 25),
    ('Longleng', 25),
    ('Peren', 25),
    ('Dzukou Valley', 25),
    ('Chumukedima', 25),
    ('Kuda', 25),
    ('Pfutsero', 25),
    ('Tizit', 25),
    ('Alichen', 25),
    ('Wozhuro', 25),
    ('Pughoboto', 25),
    ('Shamator', 25),
    ('Tseminyu', 25),
    ('Meluri', 25);

-- Insert more cities for the state of "Odisha"
INSERT INTO cities (name, state_id) VALUES
    ('Bhubaneswar', 26),
    ('Cuttack', 26),
    ('Rourkela', 26),
    ('Puri', 26),
    ('Sambalpur', 26),
    ('Balasore', 26),
    ('Jharsuguda', 26),
    ('Brahmapur', 26),
    ('Baripada', 26),
    ('Bhadrak', 26),
    ('Angul', 26),
    ('Bargarh', 26),
    ('Balangir', 26),
    ('Kendujhar', 26),
    ('Jeypore', 26),
    ('Bolangir', 26),
    ('Rayagada', 26),
    ('Boudh', 26),
    ('Debagarh', 26),
    ('Koraput', 26),
    ('Nabarangpur', 26),
    ('Nayagarh', 26),
    ('Phulbani', 26),
    ('Paradip', 26),
    ('Dhenkanal', 26),
    ('Jagatsinghpur', 26),
    ('Kendrapara', 26),
    ('Jajpur', 26),
    ('Mayurbhanj', 26),
    ('Khordha', 26),
    ('Nuapada', 26);
   
   -- Insert more cities for the union territory of "Puducherry"
INSERT INTO cities (name, state_id) VALUES
    ('Puducherry', 27),
    ('Karaikal', 27),
    ('Mahe', 27),
    ('Yanam', 27),
    ('Bahour', 27),
    ('Nedungadu', 27),
    ('Manavely', 27),
    ('Thirunallar', 27),
    ('Ozhukarai', 27),
    ('Villianur', 27),
    ('Ariankuppam', 27);

-- Insert more cities for the state of "Punjab"
INSERT INTO cities (name, state_id) VALUES
    ('Amritsar', 28),
    ('Ludhiana', 28),
    ('Jalandhar', 28),
    ('Patiala', 28),
    ('Bathinda', 28),
    ('Hoshiarpur', 28),
    ('Pathankot', 28),
    ('Moga', 28),
    ('Firozpur', 28),
    ('Muktsar', 28),
    ('Kapurthala', 28),
    ('Sangrur', 28),
    ('Faridkot', 28),
    ('Gurdaspur', 28),
    ('Sahibzada Ajit Singh Nagar', 28),
    ('Rupnagar', 28),
    ('Barnala', 28),
    ('Khanna', 28),
    ('Mansa', 28),
    ('Sirhind', 28),
    ('Abohar', 28),
    ('Malout', 28),
    ('Nawanshahr', 28),
    ('Moga', 28),
    ('Rajpura', 28),
    ('Tarn Taran', 28),
    ('Fazilka', 28),
    ('Kharar', 28);

    -- Insert cities for the state of "Rajasthan"
INSERT INTO cities (name, state_id) VALUES
    ('Jaipur', 29),
    ('Jodhpur', 29),
    ('Udaipur', 29),
    ('Kota', 29),
    ('Ajmer', 29),
    ('Bikaner', 29),
    ('Alwar', 29),
    ('Sikar', 29),
    ('Barmer', 29),
    ('Bhilwara', 29),
    ('Chittorgarh', 29),
    ('Sawai Madhopur', 29),
    ('Bharatpur', 29),
    ('Dungarpur', 29),
    ('Jhunjhunu', 29),
    ('Pali', 29),
    ('Nagaur', 29),
    ('Tonk', 29),
    ('Rajsamand', 29),
    ('Sirohi', 29),
    ('Hanumangarh', 29),
    ('Dholpur', 29),
    ('Karauli', 29),
    ('Baran', 29),
    ('Jalore', 29),
    ('Sri Ganganagar', 29),
    ('Banswara', 29),
    ('Jaisalmer', 29);


-- Insert more cities for the state of "Sikkim"
INSERT INTO cities (name, state_id) VALUES
    ('Gangtok', 30),
    ('Namchi', 30),
    ('Mangan', 30),
    ('Singtam', 30),
    ('Rangpo', 30),
    ('Naya Bazar', 30),
    ('Rabongla', 30),
    ('Gyalshing', 30),
    ('Soreng', 30),
    ('Jorethang', 30),
    ('Majhitar', 30),
    ('Rhenock', 30),
    ('Yuksom', 30),
    ('Sombari', 30),
    ('Rinchenpong', 30),
    ('Legship', 30),
    ('Chungthang', 30),
    ('Melli', 30),
    ('Rorathang', 30),
    ('Temi', 30),
    ('Ravangla', 30),
    ('Rhenock', 30),
    ('Gyalshing', 30),
    ('Namthang', 30),
    ('Rorathang', 30),
    ('Dentam', 30),
    ('Rongli', 30),
    ('Kabi', 30),
    ('Chakhung', 30);

-- Insert more cities for the state of "Tamil Nadu"
INSERT INTO cities (name, state_id) VALUES
    ('Chennai', 31),
    ('Coimbatore', 31),
    ('Madurai', 31),
    ('Tiruchirappalli', 31),
    ('Salem', 31),
    ('Tirunelveli', 31),
    ('Tiruppur', 31),
    ('Vellore', 31),
    ('Thoothukudi', 31),
    ('Nagercoil', 31),
    ('Thanjavur', 31),
    ('Dindigul', 31),
    ('Cuddalore', 31),
    ('Kanchipuram', 31),
    ('Tiruvannamalai', 31),
    ('Karur', 31),
    ('Ranipet', 31),
    ('Erode', 31),
    ('Namakkal', 31),
    ('Sivakasi', 31),
    ('Hosur', 31),
    ('Ambur', 31),
    ('Mayiladuthurai', 31),
    ('Rajapalayam', 31),
    ('Karaikudi', 31),
    ('Neyveli', 31),
    ('Nagapattinam', 31),
    ('Vaniyambadi', 31),
    ('Aruppukkottai', 31),
    ('Pollachi', 31),
    ('Pudukkottai', 31),
    ('Kumbakonam', 31),
    ('Thiruvarur', 31),
    ('Sankarankovil', 31),
    ('Tenkasi', 31),
    ('Ramanathapuram', 31),
    ('Udhagamandalam (Ooty)', 31),
    ('Dharmapuri', 31),
    ('Kovilpatti', 31),
    ('Namakkal', 31),
    ('Perambalur', 31),
    ('Virudhachalam', 31),
    ('Poonamallee', 31),
    ('Ambasamudram', 31),
    ('Gudalur', 31),
    ('Vikramasingapuram', 31);

-- Insert more cities for the state of "Telangana"
INSERT INTO cities (name, state_id) VALUES
    ('Hyderabad', 32),
    ('Warangal', 32),
    ('Nizamabad', 32),
    ('Karimnagar', 32),
    ('Ramagundam', 32),
    ('Khammam', 32),
    ('Mahbubnagar', 32),
    ('Nalgonda', 32),
    ('Adilabad', 32),
    ('Suryapet', 32),
    ('Miryalaguda', 32),
    ('Jagtial', 32),
    ('Peddapalli', 32),
    ('Bodhan', 32),
    ('Kothagudem', 32),
    ('Siddipet', 32),
    ('Sircilla', 32),
    ('Mancherial', 32),
    ('Wanaparthy', 32),
    ('Kamareddy', 32),
    ('Mettur', 32),
    ('Bhongir', 32),
    ('Vikarabad', 32),
    ('Jangaon', 32),
    ('Armoor', 32),
    ('Bellampalle', 32),
    ('Narayanpet', 32),
    ('Sadasivpet', 32),
    ('Yadagirigutta', 32),
    ('Kodad', 32),
    ('Sangareddy', 32),
    ('Koratla', 32),
    ('Bhupalpally', 32),
    ('Kagaznagar', 32),
    ('Tandur', 32),
    ('Kollapur', 32),
    ('Nakrekal', 32),
    ('Kamareddy', 32);

 -- Insert more cities for the state of "Tripura"
INSERT INTO cities (name, state_id) VALUES
    ('Agartala', 33),
    ('Udaipur', 33),
    ('Dharmanagar', 33),
    ('Ambassa', 33),
    ('Kailasahar', 33),
    ('Khowai', 33),
    ('Belonia', 33),
    ('Sabroom', 33),
    ('Amarpur', 33),
    ('Kamalpur', 33),
    ('Sonamura', 33),
    ('Bishalgarh', 33),
    ('Melaghar', 33),
    ('Mankachar', 33),
    ('Jirania', 33),
    ('Kanchanpur', 33),
    ('Kumarghat', 33),
    ('Kurubashini', 33),
    ('Ranirbazar', 33),
    ('Chawmanu', 33),
    ('Tlabung', 33),
    ('Manu', 33),
    ('Rupaichari', 33),
    ('Kamalasagar', 33),
    ('Longtharai Valley', 33),
    ('Mohanpur', 33),
    ('Kamalpur', 33),
    ('Sabroom', 33);
   
   -- Insert more cities for the state of "Uttar Pradesh"
INSERT INTO cities (name, state_id) VALUES
    ('Lucknow', 34),
    ('Kanpur', 34),
    ('Agra', 34),
    ('Varanasi', 34),
    ('Allahabad', 34),
    ('Ghaziabad', 34),
    ('Meerut', 34),
    ('Noida', 34),
    ('Bareilly', 34),
    ('Aligarh', 34),
    ('Moradabad', 34),
    ('Saharanpur', 34),
    ('Gorakhpur', 34),
    ('Jhansi', 34),
    ('Muzaffarnagar', 34),
    ('Mathura', 34),
    ('Rampur', 34),
    ('Faizabad', 34),
    ('Hapur', 34),
    ('Sultanpur', 34),
    ('Firozabad', 34),
    ('Bulandshahr', 34),
    ('Etawah', 34),
    ('Jaunpur', 34),
    ('Mirzapur', 34),
    ('Banda', 34),
    ('Amroha', 34),
    ('Hardoi', 34),
    ('Fatehpur', 34),
    ('Raebareli', 34),
    ('Orai', 34),
    ('Lalitpur', 34),
    ('Shahjahanpur', 34),
    ('Bahraich', 34),
    ('Sambhal', 34),
    ('Unnao', 34);

   -- Insert more cities for the state of "Uttarakhand"
INSERT INTO cities (name, state_id) VALUES
    ('Dehradun', 35),
    ('Haridwar', 35),
    ('Roorkee', 35),
    ('Haldwani', 35),
    ('Kashipur', 35),
    ('Rudrapur', 35),
    ('Rishikesh', 35),
    ('Kotdwar', 35),
    ('Pithoragarh', 35),
    ('Rudraprayag', 35),
    ('Champawat', 35),
    ('Tehri', 35),
    ('Almora', 35),
    ('Bageshwar', 35),
    ('Chamoli', 35),
    ('Udham Singh Nagar', 35),
    ('Nainital', 35),
    ('Pauri', 35),
    ('Uttarkashi', 35),
    ('Mussoorie', 35),
    ('Joshimath', 35),
    ('Lansdowne', 35),
    ('Munsiari', 35),
    ('Didihat', 35),
    ('Chakrata', 35),
    ('Bhowali', 35),
    ('Kichha', 35),
    ('Ramnagar', 35),
    ('Pantnagar', 35),
    ('Bajpur', 35),
    ('Sitarganj', 35);

 -- Insert more cities for the state of "West Bengal"
INSERT INTO cities (name, state_id) VALUES
    ('Kolkata', 36),
    ('Howrah', 36),
    ('Durgapur', 36),
    ('Asansol', 36),
    ('Siliguri', 36),
    ('Bardhaman', 36),
    ('Malda', 36),
    ('Baharampur', 36),
    ('Kharagpur', 36),
    ('Haldia', 36),
    ('Raniganj', 36),
    ('Raiganj', 36),
    ('Krishnanagar', 36),
    ('Balurghat', 36),
    ('Bankura', 36),
    ('Cooch Behar', 36),
    ('Purulia', 36),
    ('Jalpaiguri', 36),
    ('Alipurduar', 36),
    ('Santipur', 36),
    ('Midnapore', 36),
    ('Serampore', 36),
    ('Rampurhat', 36),
    ('Bangaon', 36),
    ('Basirhat', 36),
    ('Diamond Harbour', 36),
    ('Kalyani', 36),
    ('Chinsurah', 36),
    ('Arambagh', 36),
    ('Tamluk', 36),
    ('Contai', 36),
    ('Habra', 36),
    ('Bally', 36),
    ('North Dumdum', 36),
    ('South Dumdum', 36),
    ('Howrah', 36),
    ('Bhatpara', 36),
    ('Panihati', 36),
    ('Barasat', 36),
    ('Barrackpore', 36),
    ('Krishnanagar', 36),
    ('Siliguri', 36);
    


