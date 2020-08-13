CREATE TABLE JOB_LISTING
( full_name varchar(50) not null,
  location varchar(30) not null,
  job_title varchar(30) not null,
  descripition varchar(500) not null,
  date_posted Date
  );

INSERT INTO JOB_LISTING VALUES('Cedric Stephani', 'Dunedin', 'Junior front-end developer', 'I need a junior level front-end developer to join my team', TO_DATE('20/07/2020','DD/MM/YYYY');
INSERT INTO JOB_LISTING VALUES('Hugo Baird', 'Dunedin', 'Junior back-end developer', 'Looking for a proficient junior back-end developer to help with my project', TO_DATE('15/05/2020','DD/MM/YYYY'); 
INSERT INTO JOB_LISTING VALUES('Evan Rashad', 'Christchurch', 'Laborer', 'I need someone to help move furniture for me', TO_DATE('15/08/2020','DD/MM/YYYY'); 
INSERT INTO JOB_LISTING VALUES('Kevin Smith', 'Auckland', 'Gardener', 'Looking for anyone who can do some weeding for my property', TO_DATE('13/08/2020','DD/MM/YYYY'); 
INSERT INTO JOB_LISTING VALUES('Richard Anderson', 'Wellington', 'Math Tutor', 'Currently need a math tutor to teach my 12-year old son algebra', TO_DATE('27/07/2020','DD/MM/YYYY'); 

