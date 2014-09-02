from django.conf.urls import patterns, include, url
from django.contrib.staticfiles.urls import staticfiles_urlpatterns
from django.views.generic import RedirectView
from gdg import views
# Uncomment the next two lines to enable the admin:
# from django.contrib import admin
# admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    url(r'^$', 'gdg.views.home'),
    url(r'contact', 'gdg.views.send_email'),
    url(r'home', 'gdg.views.home'),
    url(r'google731333321e881da7.html', 'gdg.views.verify'),
    (r'^register/$', RedirectView.as_view(url='https://docs.google.com/forms/d/1wU1o3fS1QwLHpn2cVEHuAgybUw91RsEq4FJwzfUUvSw/viewform?c=0&w=1&usp=mail_form_link')),

    # url(r'contactus^$', 'contact.views.contactus'),
    # url(r'^gdg/', include('gdg.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    # url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    # url(r'^admin/', include(admin.site.urls)),
)
urlpatterns += staticfiles_urlpatterns()	
