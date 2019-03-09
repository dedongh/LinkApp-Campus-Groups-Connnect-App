package com.engineerskasa.linkapp;

import com.engineerskasa.linkapp.Models.EventsMain;
import com.engineerskasa.linkapp.Models.GroupList;
import com.engineerskasa.linkapp.Models.announcement;
import com.engineerskasa.linkapp.Models.events;
import com.engineerskasa.linkapp.Models.groups;
import com.engineerskasa.linkapp.Models.subscribersList;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface FetchInfo {

    @POST("get_info.php")
    @FormUrlEncoded
    Call<List<groups>> loadGroups(@Field("table") String pars);

    @POST("get_info.php")
    @FormUrlEncoded
    Call<List<events>> loadEvents(@Field("table") String pars);

    @POST("get_event.php")
    @FormUrlEncoded
    Call<EventsMain> loadEvent(@Field("id") String pars);

    @POST("get_group.php")
    @FormUrlEncoded
    Call<GroupList> loadGroupInfo(@Field("id") String pars);

    @POST("get_announcement.php")
    @FormUrlEncoded
    Call<List<announcement>> loadGroupAnnouncemnet(@Field("id") String pars);

    @POST("add_subscribers.php")
    @FormUrlEncoded
    Call<String> subscribe(@Field("id") String pars,@Field("token") String pars2);

    @POST("get_subscribers.php")
    @FormUrlEncoded
    Call<subscribersList> fetchSubscribe(@Field("id") String pars, @Field("token") String pars2);
}
