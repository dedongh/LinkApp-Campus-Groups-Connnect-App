package com.engineerskasa.linkapp;

import android.media.Image;
import android.support.design.widget.AppBarLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.engineerskasa.linkapp.Models.EventsMain;
import com.engineerskasa.linkapp.Models.events;
import com.engineerskasa.linkapp.Remote.RetrofitClient;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainEvent extends AppCompatActivity {
    FetchInfo mFetchInfo;
    TextView mTextView1,mTextView2,mTextView3;
    ImageView mView;

    String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_event);

        Toolbar myToolbar = (Toolbar) findViewById(R.id.tool_bar);
        setSupportActionBar(myToolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        getSupportActionBar().setHomeButtonEnabled(true);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        mTextView1 = (TextView)findViewById(R.id.eventname);
        mTextView2 = (TextView)findViewById(R.id.EventName);
        mTextView3 = (TextView)findViewById(R.id.EventDesc);
        mView = (ImageView)findViewById(R.id.eventlogo);

        mFetchInfo = RetrofitClient.getAPIService();

        AppBarLayout appBarLayout = (AppBarLayout) findViewById(R.id.appbar);
        appBarLayout.addOnOffsetChangedListener(new AppBarLayout.OnOffsetChangedListener() {
            @Override
            public void onOffsetChanged(AppBarLayout appBarLayout, int verticalOffset) {
                if (Math.abs(verticalOffset) == appBarLayout.getTotalScrollRange()) {
                    // If collapsed, then do this
                    mTextView1.setVisibility(View.VISIBLE);
                } else if (verticalOffset == 0) {
                    // If expanded, then do this
                    mTextView1.setVisibility(View.GONE);
                } else {
                    // Somewhere in between
                    // Do according to your requirement
                }
            }
        });


        if(getIntent() != null){
            id = getIntent().getStringExtra("id");
            displaySomething(id);
        }

    }

    private void displaySomething(String id) {
       mFetchInfo.loadEvent(id).enqueue(new Callback<EventsMain>() {
           @Override
           public void onResponse(Call<EventsMain> call, Response<EventsMain> response) {
               List<events> mevents = response.body().getEvents();
               mTextView1.setText(mevents.get(0).getEventName());
               mTextView2.setText(mevents.get(0).getEventName());
               mTextView3.setText(mevents.get(0).getEventDesc());
               Picasso
                       .with(getBaseContext())
                       .load(mevents.get(0).getIcon())
                       .into(mView);


           }

           @Override
           public void onFailure(Call<EventsMain> call, Throwable t) {

           }
       });
    }
}
