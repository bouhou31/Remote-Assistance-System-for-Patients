package com.example.bcs.MyDoctor;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class InterfaceParametres extends AppCompatActivity {
    public String numero ;
    private DBAdapter BDD;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        System.gc();
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaregle);
        BDD = BaseDeDonnes.BDD;
    }
    public void sauvegarder(View v)
    {
        TextView recup = (TextView) findViewById(R.id.num);

            //ArrayList<Patient> pat = new ArrayList<Patient>();

           /* Cursor c = BDD.recupererUnPatient(1);
            //c.moveToFirst();
           /* while(c.moveToNext()==true)
            {
                pat.add(new Patient (c.getInt(0),c.getString(1), c.getString(2) , c.getString(3), c.getString(4),c.getString(5),c.getString(6),c.getString(7),c.getString(8),c.getString(9),c.getString(10),c.getString(11),c.getString(12),c.getString(13),c.getString(14),c.getString(15),c.getString(16)));
            }*/

            /*BDD.insererUnPatient(pat.get(0).getNom(),pat.get(0).getPrenom(),pat.get(0).getDate_naissance(),pat.get(0).getAdresse(),
                    pat.get(0).getEmail(),pat.get(0).getTelephone(),pat.get(0).getEtat_civil(),pat.get(0).getSexe(),pat.get(0).getType_diabete(),
                    pat.get(0).getDate_debut_diabete(),pat.get(0).getNom_maladie(),pat.get(0).getDate_debut_maladie(),pat.get(0).getTaille(),
                    pat.get(0).getTypesang(),pat.get(0).getPoids(),numero);*/

            numero = recup.getText().toString();
            Toast.makeText(getBaseContext(),"Numéro d'urgence sauvegardé " + numero, Toast.LENGTH_SHORT).show();
            Intent intent = new Intent(this, InterfaceUrgence.class);
            this.startActivityForResult(intent, 1000);

    }
}
