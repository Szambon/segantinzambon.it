var map =
[
	{
		"IT" : "AlbMat1.php",
		"EN" : "WedAlb1.php"
	},
	
	{
		"IT" : "AlbMat2.php",
		"EN" : "WedAlb2.php"
	},
	
	{
		"IT" : "AlbMat3.php",
		"EN" : "WedAlb3.php"
	},
	
	{
		"IT" : "AlbMat4.php",
		"EN" : "WedAlb4.php"
	},
	
	{
		"IT" : "AlbMat5.php",
		"EN" : "WedAlb5.php"
	},
	
	{
		"IT" : "Albums2.htm",
		"EN" : "Albums2_EN.htm"
	},
	
	{
		"IT" : "Congressi.php",
		"EN" : "Meetings.php"
	},
	
	{
		"IT" : "Consigliati.htm",
		"EN" : "Links.htm"
	},
	
	{
		"IT" : "Contatto.htm",
		"EN" : "Contact_us.htm"
	},
	
	{
		"IT" : "EventiCongressiVeneziaLido.htm",
		"EN" : "Events_meetings_conferences.htm"
	},
	
	{
		"IT" : "EventiReligiosi.php",
		"EN" : "ReligiousEvents.php"
	},
	
	{
		"IT" : "FAQ.html",
		"EN" : "FAQ_EN.html"
	},
	
	{
		"IT" : "FotoAlbum.htm",
		"EN" : "PhotoAlbum.htm"
	},
	
	{
		"IT" : "FotografoMatrimonioVenezia.htm",
		"EN" : "About_us.htm"
	},
	
	{
		"IT" : "Fujifilm.htm",
		"EN" : "Fujifilm_EN.htm"
	},
	
	{
		"IT" : "Galleria.htm",
		"EN" : "Gallery.htm"
	},
	
	{
		"IT" : "GalleriaMatrimonio.php",
		"EN" : "WeddingGallery.php"
	},
	
	{
		"IT" : "PersonalPhotographerVenice.htm",
		"EN" : "PersonalPhotographerVenice_EN.htm"
	},
	
	{
		"IT" : "Prezziok.htm",
		"EN" : "Prezziok_EN.htm"
	},
	
	{
		"IT" : "PrezziServizioMatrimonialeVenezia.htm",
		"EN" : "Prices.htm"
	}
];

function findPage(LanguageFrom, LanguageTo, PageName)
{
	var index = -1;
	for(var i = 0; i< map.length; i++)
	{
		var current = map[i];
		if(current[LanguageFrom] == PageName)
		{
			index = i;
			break;
		}
	}
	return index;
}

function changeLanguage(to)
{
	var url = document.URL;
	var matches = /(.)*?\.it\/(EN|IT)\/(.*)/g.exec(url);
	var index = findPage(matches[2], to, matches[3]);
	if(index != -1)
	{
		var PageName = map[index][to];
		location.href = '/'+to+'/'+PageName;
	}
	else
	{
		location.href = '/'+to+'/'+matches[3];
	}
}

$(document).ready(function(e) {
    $("#language_picker").change(function() {
        changeLanguage($(this).val());
    });
});