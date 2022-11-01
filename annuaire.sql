#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: student
#------------------------------------------------------------

CREATE TABLE student(
        id     Int  Auto_increment  NOT NULL ,
        nom    Text NOT NULL ,
        prenom Text NOT NULL ,
        mail   Text NOT NULL ,
        number Varchar (250) NOT NULL
	,CONSTRAINT student_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jpo
#------------------------------------------------------------

CREATE TABLE jpo(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (250) NOT NULL ,
        date Date NOT NULL
	,CONSTRAINT jpo_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: annee
#------------------------------------------------------------

CREATE TABLE annee(
        id  Int  Auto_increment  NOT NULL ,
        nom Varchar (250) NOT NULL
	,CONSTRAINT annee_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: filiere
#------------------------------------------------------------

CREATE TABLE filiere(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (250) NOT NULL
	,CONSTRAINT filiere_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jpostudent
#------------------------------------------------------------

CREATE TABLE jpostudent(
        id     Int NOT NULL ,
        id_jpo Int NOT NULL
	,CONSTRAINT jpostudent_PK PRIMARY KEY (id,id_jpo)

	,CONSTRAINT jpostudent_student_FK FOREIGN KEY (id) REFERENCES student(id)
	,CONSTRAINT jpostudent_jpo0_FK FOREIGN KEY (id_jpo) REFERENCES jpo(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: anneestudent
#------------------------------------------------------------

CREATE TABLE anneestudent(
        id       Int NOT NULL ,
        id_annee Int NOT NULL
	,CONSTRAINT anneestudent_PK PRIMARY KEY (id,id_annee)

	,CONSTRAINT anneestudent_student_FK FOREIGN KEY (id) REFERENCES student(id)
	,CONSTRAINT anneestudent_annee0_FK FOREIGN KEY (id_annee) REFERENCES annee(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: filierestudent
#------------------------------------------------------------

CREATE TABLE filierestudent(
        id         Int NOT NULL ,
        id_filiere Int NOT NULL
	,CONSTRAINT filierestudent_PK PRIMARY KEY (id,id_filiere)

	,CONSTRAINT filierestudent_student_FK FOREIGN KEY (id) REFERENCES student(id)
	,CONSTRAINT filierestudent_filiere0_FK FOREIGN KEY (id_filiere) REFERENCES filiere(id)
)ENGINE=InnoDB;

