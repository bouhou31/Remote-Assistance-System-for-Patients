package com.example.bcs.MyDoctor;

import android.app.Activity;
import android.content.Context;
import android.database.Cursor;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.ListView;

import java.util.ArrayList;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfaceTraitement extends AppCompatActivity {

    private Context context;
    Activity activite;
    private DBAdapter BDD;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundarytraitement);

        context = this;
        activite = this;
        BDD = BaseDeDonnes.BDD;
        ArrayList<Traitement> traits = new ArrayList<Traitement>();
        Cursor c = BDD.recupererLaListeDesTraitementParPatient(1);
        //c.moveToFirst();
        while(c.moveToNext()==true)
        {
            traits.add(new Traitement(c.getInt(0),c.getString(1), c.getString(2) , c.getString(3), 0));
        }
        ListView lsttrait = (ListView) this.findViewById(R.id.listView);
        final MyAdapterTraitement adp = new MyAdapterTraitement(this , traits);
        lsttrait.setAdapter(adp);
    }
}
