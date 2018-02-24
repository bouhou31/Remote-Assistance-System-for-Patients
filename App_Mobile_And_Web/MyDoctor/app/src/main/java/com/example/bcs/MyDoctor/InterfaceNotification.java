package com.example.bcs.MyDoctor;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;

/**
 * Created by bcs on 10/05/2016.
 */
public class InterfaceNotification extends AppCompatActivity {

    @Override
    public  void onDestroy() {
        super.onDestroy(); System.gc();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.boundarynotification);
    }
}
