package com.example.bcs.MyDoctor;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfacePrelevement extends AppCompatActivity {

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundaryprelevement);
    }
    public void glycemie(View v)
    {
        Intent intent = new Intent(this, InterfacePrelevementGlycemie.class);
        this.startActivityForResult(intent, 1000);
    }
    public void tension(View v)
    {
        Intent intent = new Intent(this, InterfacePrelevementTension.class);
        this.startActivityForResult(intent, 1000);
    }
    public void indicateur(View v)
    {
        Intent intent = new Intent(this, InterfacePrelevementIndicateur.class);
        this.startActivityForResult(intent, 1000);
    }
}
