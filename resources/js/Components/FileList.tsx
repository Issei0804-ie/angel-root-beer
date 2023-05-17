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
            {files.map((file) => (
                <div key={file.id}>
                    <a href={file.file_path}>
                        <span>File:</span>
                        <span>{file.file_name}</span>
                    </a>
                </div>
            ))}
        </div>
    )
}

export default FileList;
