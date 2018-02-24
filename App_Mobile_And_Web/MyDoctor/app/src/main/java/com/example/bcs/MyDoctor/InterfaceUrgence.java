package com.example.bcs.MyDoctor;

import android.Manifest;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

import java.util.ArrayList;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfaceUrgence extends AppCompatActivity {
    private DBAdapter BDD;
    Context context;
    Activity activite;

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaryurgence);
        BDD = BaseDeDonnes.BDD;
        activite = this;
        Button appel = (Button) findViewById(R.id.appelurgence);
        appel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ArrayList<Patient> pat = new ArrayList<Patient>();
                Cursor c = BDD.recupererUnPatient(1);
                //c.moveToFirst();
                while(c.moveToNext()==true)
                {
                    pat.add(new Patient (c.getInt(0),c.getString(1), c.getString(2) , c.getString(3), c.getString(4),c.getString(5),c.getString(6),c.getString(7),c.getString(8),c.getString(9),c.getString(10),c.getString(11),c.getString(12),c.getString(13),c.getString(14),c.getString(15),c.getString(16)));
                }

                if (ActivityCompat.checkSelfPermission(activite, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {

                    return;
                }
                String num = pat.get(0).getNumurgence();
                activite.startActivity(new Intent(Intent.ACTION_CALL, Uri.parse("tel:" + num)));
            }
        });
    }
    public void parametres(View v)
    {
        Intent intent = new Intent(this, InterfaceParametres.class);
        this.startActivityForResult(intent, 1000);
    }
}
