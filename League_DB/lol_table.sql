CREATE TABLE Summoner	(  sid			int NOT NULL,
						   accType		char(15) NOT NULL,
						   sname	 	varchar(20) NOT NULL,
						   PRIMARY KEY (sid));
                           
CREATE TABLE Team		(  team_id		int NOT NULL,
					       team_name	varchar(50),
					       member_1		varchar(20) NOT NULL,
					       member_2	 	varchar(20),
					       member_3		varchar(20),
					       member_4		varchar(20),
					       member_5		varchar(20),
					       PRIMARY KEY (teamid));
                           
CREATE TABLE Member_of	(  sid			int NOT NULL,
					       team_id		int NOT NULL,
					       PRIMARY KEY (sid, teamid),
					       FOREIGN KEY (sid) REFERENCES Summoner DELETE ON CASCADE,
					       FOREIGN KEY (teamid) REFERENCES Team DELETE ON CASCADE);
                           
CREATE TABLE Items		(  iid		    int NOT NULL,
					       item_name	varchar(50) NOT NULL,
					       PRIMARY KEY (iid));

CREATE TABLE Champions	(  cid			int NOT NULL,
					       champ_name	varchar(50) NOT NULL,
					       title		varchar(50),
					       PRIMARY KEY (cid));
                           
CREATE TABLE Tournaments ( tid			int NOT NULL,
				           t_name		varchar(50),
  				           date 		varchar(15) NOT NULL,
				           team_id_1		int NOT NULL,
						   team_id_2		int NOT NULL,
			               team_id_3		int NOT NULL,
				           team_id_4		int NOT NULL,
			               team_id_5		int NOT NULL,
				           team_id_6		int NOT NULL,
						   team_id_7		int NOT NULL,
   			               team_id_8		int NOT NULL,
                           PRIMARY KEY (tid),					   
                           FOREIGN KEY (team_id_1) REFERENCES Team (team_id),
						   FOREIGN KEY (team_id_2) REFERENCES Team (team_id),
						   FOREIGN KEY (team_id_3) REFERENCES Team (team_id),
				           FOREIGN KEY (team_id_4) REFERENCES Team (team_id),
				           FOREIGN KEY (team_id_5) REFERENCES Team (team_id),
						   FOREIGN KEY (team_id_6) REFERENCES Team (team_id),
						   FOREIGN KEY (team_id_7) REFERENCES Team (team_id),
						   FOREIGN KEY (team_id_8) REFERENCES Team (team_id));
                           
CREATE TABLE Plays	(	sid			int NOT NULL,
					    mid			int NOT NULL,
					    cid			int NOT NULL,
						iid_1	 	int,
					    iid_2		int,
						iid_3		int,
						iid_4		int,
						iid_5		int,
						iid_6		int,
						kills		int NOT NULL,
						deaths		int NOT NULL,
						assists		int NOT NULL,
						level		int	NOT NULL,
						side		int NOT NULL,
						PRIMARY KEY (sid, mid),
						FOREIGN KEY (sid) REFERENCES Summoner,
						FOREIGN KEY (mid) REFERENCES Matches,
						FOREIGN KEY (cid) REFERENCES Champions,
						FOREIGN KEY (iid) REFERENCES Items);

CREATE TABLE Part_of (	mid		int NOT NULL,
						tid		int NOT NULL,
						PRIMARY KEY (mid, tid),
						FOREIGN KEY (mid) REFERENCES Matches,
						FOREIGN KEY (tid) REFERENCES Tournament);
                        
CREATE TABLE Matches  ( mid				int NOT NULL,
						barons_1		int NOT NULL,
						barons_2		int NOT NULL,
						totalgold_1 	int NOT NULL,
						totalgold_2		int NOT NULL,
						turrets_1		int NOT NULL,
						turrets_2		int NOT NULL,
						time		 	varchar(10) NOT NULL,
						win				int NOT NULL,
						totalkills_1	int NOT NULL,
						totalkills_2	int NOT NULL,
						totaldeaths_1	int NOT NULL,
						totaldeaths_2	int NOT NULL,			
						finalscore		varchar(5) NOT NULL,
						PRIMARY KEY (mid));
	
