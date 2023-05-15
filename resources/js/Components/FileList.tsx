import React, {useRef} from "react";
import { Inertia } from '@inertiajs/inertia';
import { ToastContainer, toast } from 'react-toastify';
import  {FileInterface}  from "../Pages/Welcome";

interface FileUploadFormProps {
    files: FileInterface[];
}
const FileList:React.FC<FileUploadFormProps> = ({ files }) => {
    return (
        <div>
            <p>{files[0].file_path}</p>
            {files.map((file) => (
                <div key={file.id}>
                    {file.file_name}
                </div>
            ))}
            <button onClick={()=>{
                console.log(files);
            }}>adsasdad</button>
        </div>
    )
}

export default FileList;
