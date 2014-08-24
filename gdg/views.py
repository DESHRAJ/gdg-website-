from django.core.context_processors import csrf
from django.template import RequestContext
from django.shortcuts import render_to_response
from django.http import Http404, HttpResponse, \
    HttpResponseRedirect, HttpResponseNotFound
from django.conf import settings
import json
from django.core.mail import send_mail
import django


def home(request):    
    """ landing page. """
    c = {}
    c.update(csrf(request))
    return render_to_response('index.html', context_instance=RequestContext(request))
# 	return HttpResponse("This page is under construction")
def send_email(request):
    name = request.POST['name']
    message = request.POST['message']
    from_email = request.POST['from_email']
    print name
    print message
    print from_email
    if message and name and from_email:
    	send_mail(from_email, message, from_email, ['deshrajdry@gmail.com'])
    	#send_mail('desharaj', 'hello this is deshraj from allahabad', 'great.shivam19@gmail.com', ['deshrajdry@gmail.com'])
    	return HttpResponse ('thankyou for contacting us ')
    # if name=='' :
    #     try:
    #         send_mail(name, message, from_email, ['deshrajdry@gmail.com'])
    #     except BadHeaderError:
    #         return HttpResponse('Invalid header found.')
    #     return HttpResponseRedirect('/home')
    else:
        # In reality we'd use a form class
        # to get proper validation errors.
        return HttpResponse('Make sure all fields are entered and valid.')
    return HttpResponseRedirect('')
