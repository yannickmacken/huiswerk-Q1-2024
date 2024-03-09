using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace VulnerableUploadApplication.Controllers
{
    public class UploadController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Upload(HttpPostedFileBase file)
        {
            if (file != null && file.ContentLength > 0)
            {
                try
                {
                    string path = Path.Combine(Server.MapPath("~/UploadedFiles/"), file.FileName);
                    string extension = Path.GetExtension(path); 

                    if (extension == ".aspx" || extension == ".asp")
                    {
                        ViewBag.Message = "Forbidden extension!";
                    }
                    else if(file.ContentType != "image/png")
                    {
                        ViewBag.Message = "Only PNG files are allowed to be uploaded";
                    }
                    else
                    {
                        file.SaveAs(path);
                        ViewBag.Message = "File uploaded successfully";
                    }
                } catch (Exception ex)
                {
                    ViewBag.Message = ex.Message;
                }
            }

            return View("Index");
        }
    }
}