package com.example.bcs.MyDoctor;

/**
 * Created by user on 14/05/2016.
 */
public class Patient {
    private int id_patient;
    private String nom;
    private String prenom;
    private String date_naissance;
    private String adresse;
    private String email;
    private String telephone;
    private String etat_civil;
    private String sexe;
    private String type_diabete;
    private String date_debut_diabete;
    private String nom_maladie;
    private String date_debut_maladie;
    private String taille;
    private String typesang;
    private String poids;
    private String numurgence;


    public Patient(int id_patien, String nom, String prenom, String date_naissance,String adresse, String email,String telephone,String etat_civil,String sexe,String typediabete,String date_debut_diabete, String nommaladie,String datedebutmaladie,String taille,String typesang,String poids,String numurgence)
    {
        this.id_patient = id_patien;
        this.nom = nom;/****/
        this.prenom = prenom;/****/
        this.adresse = adresse;/****/
        this.date_naissance= date_naissance;/****/
        this.email = email;/****/
        this.telephone = telephone; /****/
        this.etat_civil = etat_civil;/****/
        this.sexe = sexe;/****/
        this.type_diabete = typediabete;/****/
        this.date_debut_diabete = date_debut_diabete;/****/
        this.nom_maladie = nommaladie;/****/
        this.date_debut_maladie = datedebutmaladie;/****/
        this.taille = taille;/****/
        this.typesang = typesang;
        this.poids = poids; /****/
        this.numurgence = numurgence;/****/

    }
    public int getId_patient(){return this.id_patient;}
    public String getNom(){return this.nom;};
    public  String getPrenom(){return  this.prenom;};
    public String getDate_naissance(){return  this.date_naissance;};
    public String getAdresse(){return this.adresse;};
    public String getEmail(){return  this.email;};
    public String getTelephone(){return  this.telephone;};
    public String getEtat_civil(){return  this.etat_civil;};
    public String getSexe(){return  this.sexe;};
    public String getType_diabete(){return  this.type_diabete;};
    public String getDate_debut_diabete(){return  this.date_debut_diabete;};
    public String getNom_maladie(){return  this.nom_maladie;};
    public String getDate_debut_maladie(){return  this.date_debut_maladie;};
    public String getTaille(){return  this.taille;};
    public String getTypesang(){return  this.typesang;};
    public String getPoids(){return  this.poids;};
    public String getNumurgence(){return  this.numurgence;};

}
