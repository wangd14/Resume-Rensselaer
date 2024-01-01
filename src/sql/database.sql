CREATE DATABASE users;

-- create table to verify login and creater user credentials
CREATE TABLE users.verify_login (
    username VARCHAR(255) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL,
    -- default user to user
    status VARCHAR(50) DEFAULT 'user',
    PRIMARY KEY (username)
);

-- create a sessoin table that keeps track of sesssions
CREATE TABLE sessions (
    session_id VARCHAR(255) PRIMARY KEY,
    user_id INT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- create users table to keep track of users
CREATE TABLE ResumeRensselaer.user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    hashed_password VARCHAR(255),
    status VARCHAR(50) DEFAULT 'free_user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX(user_id)  -- Add an index on user_id
);


-- create user data table to keeps track of user data
CREATE TABLE ResumeRensselaer.user_data (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    resume_info JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES ResumeRensselaer.user(user_id)
);

-- potential way to insert user resume info

INSERT INTO ResumeRensselaer.user_data (user_id, resume_info)
VALUES (
    (SELECT user_id FROM ResumeRensselaer.user WHERE username = 'Honey_Doggy'),
    '{
        "education": [
            {
                "degree": "Bachelor of Arts",
                "major": "Creative Writing",
                "school": "PawPrint University",
                "year": 2022
            }
        ],
        "experience": [
            {
                "title": "Content Writer",
                "company": "Bark Communications",
                "year": 2023
            }
        ]
    }'
);
