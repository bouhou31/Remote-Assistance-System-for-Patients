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
public class InterfaceReservation extends AppCompatActivity {


    private Context context;
    Activity activite;
    private DBAdapter BDD;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaryreservation);

        context = this;
        activite = this;
        BDD = BaseDeDonnes.BDD;
        ArrayList<Reservation> res = new ArrayList<Reservation>();
        Cursor c = BDD.recupererLaListeDesReservationsParPatient(1);
        //c.moveToFirst();
        while(c.moveToNext()==true)
        {
            res.add(new Reservation(c.getInt(0),c.getString(1),c.getString(2), c.getString(3) , c.getString(4),0));
        }
        ListView lstres = (ListView) this.findViewById(R.id.listView);
        final MyAdapterReservation adp = new MyAdapterReservation(this ,res);
        lstres.setAdapter(adp);

    }

    public void AjouterReservation(View v)
    {
        Intent intent = new Intent(this, InterfaceAjouterReservation.class);
        this.startActivityForResult(intent, 1000);
    }

}
