package com.engineerskasa.linkapp;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.DialogInterface;
import android.net.Uri;
import android.os.Bundle;
import android.provider.Settings;
import android.support.v4.app.Fragment;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.engineerskasa.linkapp.Adapter.GroupMeetingDays;
import com.engineerskasa.linkapp.Models.GroupList;
import com.engineerskasa.linkapp.Models.Meetings;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.Models.subscribersList;
import com.engineerskasa.linkapp.Remote.RetrofitClient;
import com.squareup.picasso.Picasso;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class GroupInformation extends Fragment {

    FetchInfo mFetchInfo;
    TextView groupName,aboutGroup,groupVision,groupAims,groupEmail,groupPhone;
    ImageView groupLogo;
    String id;
    GroupMeetingDays mDashboardAdapter;
    RecyclerView mRecyclerView;
    Button subscribeGroup,unsubscribeGroup;
    private String android_id;
    public GroupInformation() {
        // Required empty public constructor
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
       View v = inflater.inflate(R.layout.fragment_group_information, container, false);
        android_id = Settings.Secure.getString(getActivity().getContentResolver(),
                Settings.Secure.ANDROID_ID);
        aboutGroup = (TextView)v.findViewById(R.id.idaboutselectedgrp);
        groupName = (TextView)getActivity().findViewById(R.id.groupnameMG);
        groupVision = (TextView)v.findViewById(R.id.idvisionsofselectedgrp);
        groupAims = (TextView)v.findViewById(R.id.idaimsofselectedgrp);
        groupEmail = (TextView)v.findViewById(R.id.idemailofselectedgrp);
        groupPhone = (TextView)v.findViewById(R.id.idphoneofselectedgrp);
        groupLogo = (ImageView)getActivity().findViewById(R.id.grouplogoMG);
        subscribeGroup = (Button)getActivity().findViewById(R.id.subscribeGroup);
        unsubscribeGroup = (Button)getActivity().findViewById(R.id.unsubscribeGroup);
        mRecyclerView = (RecyclerView)v.findViewById(R.id.meetings);
        mRecyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));

        mFetchInfo = RetrofitClient.getAPIService();

        if(getActivity().getIntent() != null)
        {
            id = getActivity().getIntent().getStringExtra("g_id");
            displayMainGroupInfo(id);
        }

        subscribeGroup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                subscribeToGroup(id,android_id);
            }
        });
        unsubscribeGroup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
               //unsubscribeToGroup();
            }
        });
        return v;
    }

    public void subscribeToGroup(final String idd, final String android_idd){
        AlertDialog.Builder dialog = new AlertDialog.Builder(getActivity());
        dialog.setTitle("Subscribe to "+groupName.getText().toString());
        LayoutInflater inflater = LayoutInflater.from(getActivity());
        View subscribe = inflater.inflate(R.layout.subscribing,null);
        dialog.setView(subscribe);
        dialog.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @SuppressLint("MissingPermission")
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                mFetchInfo.subscribe(idd,android_idd).enqueue(new Callback<String>() {
                    @Override
                    public void onResponse(Call<String> call, Response<String> response) {
                        if(response.isSuccessful()){
                            Toast.makeText(getActivity(), "Subscribed to "+groupName.getText().toString(), Toast.LENGTH_SHORT).show();
                        }

                    }

                    @Override
                    public void onFailure(Call<String> call, Throwable t) {

                    }
                });
                subscribeGroup.setVisibility(View.GONE);
                unsubscribeGroup.setVisibility(View.VISIBLE);
            }
        });
        dialog.show();
    }

   /* public void unsubscribeToGroup() {
        AlertDialog.Builder dialog = new AlertDialog.Builder(getActivity());
        dialog.setTitle("Unsubscribe from "+grpname.getText().toString());
        LayoutInflater inflater = LayoutInflater.from(getActivity());
        final View unsubscribe = inflater.inflate(R.layout.unsubscribing,null);
        dialog.setView(unsubscribe);
        dialog.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @SuppressLint("MissingPermission")
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                FirebaseMessaging.getInstance().unsubscribeFromTopic(grpname.getText().toString());
                Toast.makeText(getActivity(), "Unsubscribed from "+grpname.getText().toString(), Toast.LENGTH_SHORT).show();
                ref.child("subscribers").child(android_id).removeValue();
                unsubscribeGroup.setVisibility(View.GONE);
                subscribeGroup.setVisibility(View.VISIBLE);
            }
        });
        dialog.setNegativeButton("CANCEL", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int which) {
                dialogInterface.dismiss();
            }
        });
        dialog.show();
    }*/
    private void displayMainGroupInfo(final String id) {
        mFetchInfo.loadGroupInfo(id).enqueue(new Callback<GroupList>() {
            @Override
            public void onResponse(Call<GroupList> call, Response<GroupList> response) {
                mFetchInfo.fetchSubscribe(id,android_id).enqueue(new Callback<subscribersList>() {
                    @Override
                    public void onResponse(Call<subscribersList> call, Response<subscribersList> response) {
                        if(response.isSuccessful()){
                            subscribeGroup.setVisibility(View.GONE);
                            unsubscribeGroup.setVisibility(View.VISIBLE);
                        }else {
                            subscribeGroup.setVisibility(View.VISIBLE);
                            unsubscribeGroup.setVisibility(View.GONE);
                        }
                    }

                    @Override
                    public void onFailure(Call<subscribersList> call, Throwable t) {

                    }
                });
                List<groups> mGroup = response.body().getGroups();
                groupName.setText(mGroup.get(0).getGroupName());
                Picasso
                        .with(getActivity())
                        .load(mGroup.get(0).getIcon())
                        .into(groupLogo);
                groupAims.setText(mGroup.get(0).getAim());
                groupVision.setText(mGroup.get(0).getVision());
                aboutGroup.setText(mGroup.get(0).getAbout());
                groupPhone.setText(mGroup.get(0).getContact());
                List<Meetings> mMeeting = response.body().getMeetings();
                mDashboardAdapter = new GroupMeetingDays(getActivity(),mMeeting);
                mDashboardAdapter.notifyDataSetChanged();
                mRecyclerView.setAdapter(mDashboardAdapter);

            }

            @Override
            public void onFailure(Call<GroupList> call, Throwable t) {

            }
        });
    }

}
