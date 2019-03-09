package com.engineerskasa.linkapp.Models;

public class Meetings {

    private String Time,Day,Venue,Latitude,Longitude,g_id;

    public Meetings(String time, String day, String venue, String latitude, String longitude, String g_id) {
        Time = time;
        Day = day;
        Venue = venue;
        Latitude = latitude;
        Longitude = longitude;
        this.g_id = g_id;
    }

    public Meetings() {
    }

    public String getTime() {
        return Time;
    }

    public void setTime(String time) {
        Time = time;
    }

    public String getDay() {
        return Day;
    }

    public void setDay(String day) {
        Day = day;
    }

    public String getVenue() {
        return Venue;
    }

    public void setVenue(String venue) {
        Venue = venue;
    }

    public String getLatitude() {
        return Latitude;
    }

    public void setLatitude(String latitude) {
        Latitude = latitude;
    }

    public String getLongitude() {
        return Longitude;
    }

    public void setLongitude(String longitude) {
        Longitude = longitude;
    }

    public String getG_id() {
        return g_id;
    }

    public void setG_id(String g_id) {
        this.g_id = g_id;
    }
}
