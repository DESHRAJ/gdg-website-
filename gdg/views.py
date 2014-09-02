from django.core.context_processors import csrf
from django.template import RequestContext
from django.shortcuts import render_to_response
from django.http import Http404, HttpResponse, \
    HttpResponseRedirect, HttpResponseNotFound
from django.conf import settings
import json
import os
from django.core.mail import send_mail
import django


def home(request):    
    """ landing page. """
    c = {}
    c.update(csrf(request))
    f = open("count.txt","r+")
    stri = f.readline()
    f.close()
    os.remove("count.txt")
    f1 = open("count.txt","w+")
    count = int(stri) + 1
    f1.write(str(count))
    f1.close()
    return render_to_response('index.html', context_instance=RequestContext(request))


def send_email(request):
    name = request.POST['name']
    message = request.POST['message']
    from_email = request.POST['from_email']
    if message and name and from_email:
    	send_mail(from_email, message, from_email, ['desh.py@gmail.com'])
        return HttpResponse ('thankyou for contacting us ')
    else:
        return HttpResponse('Make sure all fields are entered and valid.')
    return HttpResponseRedirect('')

def verify(request):
	    return render_to_response('google731333321e881da7.html', context_instance=RequestContext(request))

# def register(request):
# 		return HttpResponseRedirect('https://docs.google.com/forms/d/1wU1o3fS1QwLHpn2cVEHuAgybUw91RsEq4FJwzfUUvSw/viewform?c=0&w=1&usp=mail_form_link')
