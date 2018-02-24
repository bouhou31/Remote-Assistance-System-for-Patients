package com.example.bcs.MyDoctor;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ListView;

import java.util.ArrayList;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfaceRendezVous extends AppCompatActivity {

    private Context context;
    Activity activite;
    private DBAdapter BDD;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaryrendezvous);
        context = this;
        activite = this;
        BDD = BaseDeDonnes.BDD;
        ArrayList<RDV> rdvs = new ArrayList<RDV>();
        Cursor c = BDD.recupererLaListeDesRDVParPatient(1);
        //c.moveToFirst();
        while(c.moveToNext()==true)
        {
            rdvs.add(new RDV (c.getInt(0),c.getString(1), c.getString(2) , c.getString(3), c.getString(4), 0));
        }
        ListView lstrdv = (ListView) this.findViewById(R.id.listView);
        final MyAdapterRDV adp = new MyAdapterRDV(this , rdvs);
        lstrdv.setAdapter(adp);
    }

    public void reservation(View v)
    {
        Intent intent = new Intent(this, InterfaceReservation.class);
        this.startActivityForResult(intent, 1000);
    }

}