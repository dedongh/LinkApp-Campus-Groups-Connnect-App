package com.engineerskasa.linkapp.Remote;

import com.engineerskasa.linkapp.FetchInfo;

public class RetrofitClient {
    public RetrofitClient() {
    }

    public static final String BASE_URL = "http://engkasa.000webhostapp.com/linkapp/";

    public static FetchInfo getAPIService(){
        return RetrofitBuilder.getmRetrofit(BASE_URL).create(FetchInfo.class);
    }
}

