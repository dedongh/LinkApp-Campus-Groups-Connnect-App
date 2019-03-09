package com.engineerskasa.linkapp.Remote;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class RetrofitBuilder {

    private static Retrofit mRetrofit = null;

    public static Retrofit getmRetrofit(String baseUrl) {
        if(mRetrofit == null)
        {
            mRetrofit = new Retrofit.Builder()
                        .baseUrl(baseUrl)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return mRetrofit;
    }
}
