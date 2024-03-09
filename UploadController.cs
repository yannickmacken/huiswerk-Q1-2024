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
                    // Upload the file using a unique identifier instead of the original file name
                    // Now a malicious user can't traverse paths (e.g. ../../../../../etc/passwd) anymore
                    // and can't overwrite existing files. Added benefit is that files can be renamed without changing location.
                    // This prevents against A01:2021 – Broken Access Control
                    string path = Path.Combine(Server.MapPath("~/UploadedFiles/"), Guid.NewGuid().ToString() + ".png");
                    string extension = Path.GetExtension(path);

                    // Only allow image/png files to be uploaded
                    // Now a malicious user can't upload any executable file anymore
                    // This prevents against A03:2021 – Injection
                    if (file.ContentType = "image/png")
                    {
                        file.SaveAs(path);
                        ViewBag.Message = "File uploaded successfully";
                    }
                    else
                    {
                        ViewBag.Message = "Only PNG files are allowed to be uploaded";
                    }
                }
                catch (Exception ex)
                {
                    ViewBag.Message = ex.Message;
                }
            }

            return View("Index");
        }
    }
}