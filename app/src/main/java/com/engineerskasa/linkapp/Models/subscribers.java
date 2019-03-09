package com.engineerskasa.linkapp.Models;

public class subscribers {

    private String id,device_token,g_id;

    public subscribers(String id, String device_token, String g_id) {
        this.id = id;
        this.device_token = device_token;
        this.g_id = g_id;
    }

    public subscribers() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDevice_token() {
        return device_token;
    }

    public void setDevice_token(String device_token) {
        this.device_token = device_token;
    }

    public String getG_id() {
        return g_id;
    }

    public void setG_id(String g_id) {
        this.g_id = g_id;
    }
}
